<label>Kategori
    <select name="category_id" required>
        <option value="">Pilih</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? null) == $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>
</label>

<label>SKU
    <input class="input" name="sku" value="{{ old('sku', $product->sku ?? '') }}" required>
</label>

<label>Nama Produk
    <input class="input" name="name" value="{{ old('name', $product->name ?? '') }}" required>
</label>

<label>Deskripsi
    <textarea class="input" rows="5" name="description">{{ old('description', $product->description ?? '') }}</textarea>
</label>

<label>Harga
    <input class="input" type="number" min="0" step="0.01" name="price" value="{{ old('price', $product->price ?? 0) }}" required>
</label>

<label>Gambar
    <input class="input" type="file" name="image" accept="image/*">
</label>

<label>
    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product->is_active ?? true))> Aktif
</label>

<button class="btn">Simpan</button>