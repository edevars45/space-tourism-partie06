{{-- resources/views/admin/technologies/_form.blade.php --}}
@php
  /** @var \App\Models\Technology|null $technology */
  $isEdit = isset($technology) && $technology?->exists;
@endphp

<form method="POST"
  action="{{ $action ?? ($isEdit ? route('admin.technologies.update', $technology) : route('admin.technologies.store')) }}"
  enctype="multipart/form-data" class="space-y-6">
  @csrf
  @if(($method ?? null) === 'PUT' || $isEdit) @method('PUT') @endif

  {{-- Nom --}}
  <div>
    <label for="name" class="block font-semibold">Nom *</label>
    <input id="name" name="name" type="text" required value="{{ old('name', $technology->name ?? '') }}"
      class="w-full border rounded p-2">
    @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>

  {{-- Slug (optionnel) --}}
  <div>
    <label for="slug" class="block font-semibold">Slug</label>
    <input id="slug" name="slug" type="text" value="{{ old('slug', $technology->slug ?? '') }}"
      class="w-full border rounded p-2">
    @error('slug') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>
  {{-- Ordre (entier) --}}
  <div>
    <label for="order" class="block font-semibold">Ordre</label>
    <input id="order" name="order" type="number" min="0" step="1" value="{{ old('order', $technology->order ?? 0) }}"
      class="w-full border rounded p-2">
    @error('order') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>

  {{-- Description --}}
  <div>
    <label for="description" class="block font-semibold">Description</label>
    <textarea id="description" name="description" rows="4"
      class="w-full border rounded p-2">{{ old('description', $technology->description ?? '') }}</textarea>
    @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>

  {{-- Site officiel --}}
  <div>
    <label for="website_url" class="block font-semibold">Site officiel (URL)</label>
    <input id="website_url" name="website_url" type="url"
      value="{{ old('website_url', $technology->website_url ?? '') }}" class="w-full border rounded p-2">
    @error('website_url') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>

  {{-- Image --}}
  <div>
    <label for="image" class="block font-semibold">Image (logo)</label>
    <input id="image" name="image" type="file" accept="image/*" class="w-full">
    @error('image') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

    @if(!empty($technology?->image_path))
      <div class="mt-2">
        <p class="text-sm text-gray-600">Image actuelle :</p>
        <img src="{{ asset('storage/' . $technology->image_path) }}" alt="Image" class="h-12">
      </div>
    @endif
  </div>

  {{-- Publié ? --}}
  <div class="flex items-center gap-2">
    <input id="is_published" name="is_published" type="checkbox" {{ old('is_published', $technology->is_published ?? true) ? 'checked' : '' }}>
    <label for="is_published" class="font-semibold">Publié</label>
    @error('is_published') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
  </div>

  <div class="flex items-center gap-3">
    <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">
      {{ $submitLabel ?? ($isEdit ? 'Mettre à jour' : 'Créer') }}
    </button>
    <a href="{{ route('admin.technologies.index') }}" class="px-4 py-2 rounded border">Annuler</a>
  </div>
</form>
