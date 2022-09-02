<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $category = Category::whereName($row['kategori'])->first();
        if(!$category)
        {
            do {
                $randomCode = chr(rand(65,90));
            }while(Category::where('code', $randomCode)->exists());
            $category = Category::create([
                'code'          => $randomCode,
                'name'          => $row['kategori'],
                'updated_by'    => Auth::user()->name,
                'created_by'    => Auth::user()->name,
            ]);
        }
        // dd($category);
        return new Product([
            'code'          => $row['kode'],
            'name'          => $row['nama'],
            'category_id'   => $category->id,
            'buying_price'  => $row['harga_beli'],
            'selling_price' => $row['harga_jual'],
            'qty'           => $row['sisa_stok'],
            'restock_qty'   => $row['stok_batas'] ?? 0,
            'status'        => 1,
            'updated_by'    => Auth::user()->name,
            'created_by'    => Auth::user()->name,
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
