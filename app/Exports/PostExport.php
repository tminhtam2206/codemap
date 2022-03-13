<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Carbon;

class PostExport implements FromCollection, WithMapping, WithHeadings{
    public function collection(){
        return Post::all();
    }

    public function map($post): array{
        return [
            $post->id,
            $post->title,
            $post->title_slug,
            $post->thumb,
            $post->cover,
            $post->content,
            $post->user_id,
            $post->views,
            $post->downloads,
            $post->delete,
            Carbon::parse($post->created_at)->format('d-m-Y H:i:m'),
            Carbon::parse($post->updated_at)->format('d-m-Y H:i:m'),
        ];
    }

    public function headings(): array{
        return [
            'ID',
            'Tiêu đề',
            'Tiêu đề không dấu',
            'Ảnh bìa',
            'Ảnh tường',
            'Nội dung',
            'ID người đăng',
            'Lượt xem',
            'Lượt tải',
            'Xóa',
            'Tạo lúc',
            'Cập nhật lúc',
        ];
    }
}
