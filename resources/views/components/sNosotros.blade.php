<div class="col-span-1 mb-4">
    <div class="bg-white rounded-lg shadow-lg h-full">
        <img src="{{ $image ?? ''}}" class="w-full h-48 object-cover rounded-t-lg" alt="Imagen">
        <div class="p-4">
            <h4 class="text-xl font-bold">{{ $title ?? ''}}</h4>
            <p class="mt-2 text-gray-600">{{ $slot ?? '' }}</p>
        </div>
    </div>
</div>
