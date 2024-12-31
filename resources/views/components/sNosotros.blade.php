<div class="col-md-6 col-lg-3 mb-4">
    <div class="card h-100 shadow">
        <img src="{{ $image ?? ''}}" class="card-img-top">
        <div class="card-body">
            <h4 class="card-title">{{ $title ?? ''}}</h4>
            <p class="card-text">{{ $slot ?? '' }}</p>
        </div>
    </div>
</div>
