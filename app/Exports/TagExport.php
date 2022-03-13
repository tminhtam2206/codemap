<?php

namespace App\Exports;

use App\Models\Tag;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Carbon;

class TagExport implements FromCollection, WithMapping, WithHeadings{
    public function collection(){
        return Tag::all();
    }

    public function map($tag): array{
        return [
            $tag->id,
            $tag->name,
            Carbon::parse($tag->created_at)->format('d-m-Y H:i:m'),
            Carbon::parse($tag->updated_at)->format('d-m-Y H:i:m'),
        ];
    }

    public function headings(): array{
        return [
            'ID',
            'Tên thẻ',
            'Tạo lúc',
            'Cập nhật lúc',
        ];
    }
}
