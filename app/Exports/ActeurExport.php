<?php

namespace App\Exports;

use App\Models\Acteur;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ActeurExport implements 
    FromCollection, WithHeadings, WithMapping, 
    WithStyles, WithEvents, WithCustomStartCell, ShouldAutoSize
{
    public function collection()
    {
        return Acteur::all();
    }

    
    public function headings(): array
    {
        return [
            '#',
            'nom_prenom',
            'Date de naissance',
            'cin_passport',
            'Nationalité',
            'Téléphone',
            'Email',
            'Statut'
        ];
    }

    
    public function map($acteur): array
    {
        return [
            $acteur->id_acteur,
            $acteur->nom_prenom,
            $acteur->date_naissance,
            $acteur->cin_passport,
            $acteur->nationalite,
            $acteur->telephone,
            $acteur->email,
            $acteur->statut,
        ];
    }

    // ✅ باش title يكون فوق
    public function startCell(): string
    {
        return 'A2';
    }

    // ✅ style ديال header
    public function styles(Worksheet $sheet)
    {
        return [
            2 => [
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

    // ✅ events (titre + align + zebra + borders)
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function($event) {

                // 🎯 titre
                $event->sheet->setCellValue('A1', 'LISTE DES ACTEURS');
                $event->sheet->mergeCells('A1:H1');

                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                    ],
                ]);

                // 📊 align columns
                $event->sheet->getStyle('A3:A50')->getAlignment()->setHorizontal('center'); // id
                $event->sheet->getStyle('C3:C50')->getAlignment()->setHorizontal('center'); // date
                $event->sheet->getStyle('F3:F50')->getAlignment()->setHorizontal('left'); // téléphone

                // 🎨 zebra lines
                for ($i = 3; $i <= 50; $i++) {
                    if ($i % 2 == 0) {
                        $event->sheet->getStyle('A'.$i.':H'.$i)->applyFromArray([
                            'fill' => [
                                'fillType' => 'solid',
                                'startColor' => ['rgb' => 'F2F2F2']
                            ],
                        ]);
                    }
                }

                // 🔲 borders
                $event->sheet->getStyle('A2:H50')->applyFromArray([
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