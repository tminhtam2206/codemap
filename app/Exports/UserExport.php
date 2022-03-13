<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Carbon;

class UserExport implements FromCollection, WithMapping, WithHeadings{
    public function collection(){
        return User::all();
    }

    public function map($user): array{
        return [
            $user->id,
            $user->username,
            $user->email,
            $user->email_verified_at,
            $user->password,
            $user->remember_token,
            $user->role,
            Carbon::parse($user->created_at)->format('d-m-Y H:i:m'),
            Carbon::parse($user->updated_at)->format('d-m-Y H:i:m'),
        ];
    }

    public function headings(): array{
        return [
            'ID',
            'Tên đăng nhập',
            'Địa chỉ email',
            'Xác nhận email',
            'Mật khẩu',
            'Nhớ mật khẩu',
            'Quyền',
            'Tạo lúc',
            'Cập nhật lúc',
        ];
    }
}
