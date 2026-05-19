<?php

namespace App\Exports;

use App\Models\Autorisation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AutorisationExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize{
    public function collection()
    {
        return Autorisation::with('acteur')->get();
    }

    public function headings(): array
{
    return [
        '#',
        'nom_prenom',
        'Date début',
        'Date fin',
        'Statut'
    ];
}

    public function map($autorisation): array
{
    return [
        $autorisation->id,
        $autorisation->acteur->nom_prenom, // ولا acteur->nom إلا بغيتي
        $autorisation->date_debut,
        $autorisation->date_fin,
        $autorisation->statut,
    ];
}

    public function styles(Worksheet $sheet)
{
    return [
        1 => [
            'font' => [
                'bold' => true,
                'size' => 13,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => '28A745']
            ],
        ],
    ];
}
}