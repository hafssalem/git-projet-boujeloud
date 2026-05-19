<?php

namespace App\Exports;

use App\Models\Evenement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EvenementExport implements 
    FromCollection, WithHeadings, WithMapping,
    WithStyles, WithEvents, WithCustomStartCell, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Evenement::all();
    }

    public function headings(): array
    {
        return [
            'date_debut',
            'date_fin',
            'frequence',
            'saison',
            'statut',
            'id_spectacle'
        ];
    }

    
    public function map($evenement): array
    {
        return [
            $evenement->date_debut,
            $evenement->date_fin,
            $evenement->frequence,
            $evenement->saison,
            $evenement->statut,
            $evenement->id_spectacle,
        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }

    
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

    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function($event) {

                $event->sheet->setCellValue('A1', 'LISTE DES SPECTACLES');
                $event->sheet->mergeCells('A1:J1');

                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                    ],
                ]);

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
