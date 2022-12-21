<?php

namespace App\Exports;

use App\Models\Template;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TemplateExport implements FromArray, WithHeadings, WithEvents
{
    /**
     * @return string
     */
    protected $category;

    /**
     * @return string
     */
    public function __construct($category)
    {
        $this->category = $category;
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->Query('body');
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return $this->Query('header');
    }

    /**
     * @return array
     */
    public function Query($type)
    {
        if ($type == 'body') {
            return json_decode(Template::where('name', $this->category)->firstOrFail()->body);
        } else {
            return json_decode(Template::where('name', $this->category)->firstOrFail()->header);
        }
    }

    /**
     * @return string
     */
    public function loop()
    {
        $data = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

        $total = count($this->Query('header'));

        if ($this->category == 'farm') {
            return strtoupper($data[$total-3]);
        }

        return strtoupper($data[$total-1]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:'.$this->loop().'1')
                        ->getFill()
                        ->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB(Color::COLOR_GREEN);
            },
        ];
    }
}