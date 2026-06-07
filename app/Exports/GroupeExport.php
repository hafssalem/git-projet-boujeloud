<?php

namespace App\Exports;

use App\Models\Groupe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GroupeExport implements 
    FromCollection, WithHeadings, WithMapping,
    WithStyles, WithEvents, WithCustomStartCell, ShouldAutoSize
{
    public function collection()
    {
        return Groupe::all();
    }

    public function headings(): array
    {
        return [
            'nom',
            'date_creation',
            'description',
            'goupe membres'
        ];
    }

    public function map($groupe): array
    {
        return [
            $groupe->nom,
            $groupe->date_creation,
            $groupe->description,
            $groupe->acteurs->pluck('nom_prenom')->implode(', ')
        ];
    }

    // باش نخلي titre فوق
    public function startCell(): string
    {
        return 'A2';
    }

    // 🎨 style header
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

    // 🎯 events
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function($event) {

                // titre
                $event->sheet->setCellValue('A1', 'LISTE DES GROUPES');
                $event->sheet->mergeCells('A1:G1');

                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                        'color' => ['rgb' => 'FFFFFF']
                    ],
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => ['rgb' => '28A745']
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                    ],
                ]);

                // ✅ عدد السطور الحقيقي
                $rows = Groupe::count() + 2;

                // align
                $event->sheet->getStyle('A3:A'.$rows)->getAlignment()->setHorizontal('center');
                $event->sheet->getStyle('G3:G'.$rows)->getAlignment()->setHorizontal('center');

                // zebra lines
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