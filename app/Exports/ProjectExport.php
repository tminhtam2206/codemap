<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Carbon;

class ProjectExport implements FromCollection, WithMapping, WithHeadings{
    public function collection(){
        return Project::all();
    }

    public function map($project): array{
        return [
            $project->id,
            $project->post_id,
            $project->user_id,
            $project->link,
            $project->pass,
            Carbon::parse($project->created_at)->format('d-m-Y H:i:m'),
            Carbon::parse($project->updated_at)->format('d-m-Y H:i:m'),
        ];
    }

    public function headings(): array{
        return [
            'ID đồ án',
            'ID bài đăng',
            'ID khách hàng',
            'Link tải',
            'Mật khẩu giải nén',
            'Tạo lúc',
            'Cập nhật lúc',
        ];
    }
}
