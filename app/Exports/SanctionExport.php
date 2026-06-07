<?php

namespace App\Exports;

use App\Models\Sanction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SanctionExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents, WithCustomStartCell, ShouldAutoSize
{
    public function collection()
    {
        return Sanction::all();
    }

    // headers
    public function headings(): array
    {
        return [
            
            'type',
            'date',
            'description',
            'nom_prenom_acteur'
        ];
    }

    // mapping
    public function map($sanction): array
    {
        return [
            $sanction->type,
            $sanction->date,
            $sanction->description,
            $sanction->acteur->nom_prenom ?? 'N/A',
        ];
    }

    // start cell
    public function startCell(): string
    {
        return 'A2';
    }

    // styles header
    public function styles(Worksheet $sheet)
{
    return [
        2 => [ // header
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
    // events
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function ($event) {

                // title
                $event->sheet->setCellValue('A1', 'LISTE DES SANCTIONS');
                $event->sheet->mergeCells('A1:G1');
                $event->sheet->getStyle('A1:G1')->getAlignment()->setHorizontal('center');

                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                    ],
                ]);

                // align
                $event->sheet->getStyle('A3:A100')->getAlignment()->setHorizontal('center');
                $event->sheet->getStyle('C3:C100')->getAlignment()->setHorizontal('center');

                // zebra
                for ($i = 3; $i <= 50; $i++) {
    if ($i % 2 == 0) {
        $event->sheet->getStyle('A'.$i.':G'.$i)->applyFromArray([
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => 'F2F2F2']
            ],
        ]);
    }
}
                // borders
                $event->sheet->getStyle('A2:G100')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => 'thin',
                        ],
                    ],
                ]);
            },
        ];
    }
}