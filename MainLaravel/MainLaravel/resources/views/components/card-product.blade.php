<div id="game-div" class="flex h-screen items-center justify-center bg-gradient-to-r from-rose-100 to-teal-100 px-4" style="width: 100%;display: flex;flex-wrap: wrap">
    
    @foreach ($products as $product)
        
        <a href="{{ route('read_more' , $product) }}"><div style="background-color: #222" class="max-w-sm overflow-hidden rounded-xl shadow-md duration-200 hover:scale-105 hover:shadow-xl">
            <img id="comp-img" class="mb-2" src='{{ $product->image_url }}' alt="company" />
            <small class="mt-2 ml-3 text-white text-xs">{{ $product->digital_content_type->name }}</small>
            <h1 class="ml-3 mt-1 text-2xl font-medium text-yellow-300 pb-2">{{ $product->name }}</h1>
            <p class="mt-1 ml-3 text-sm tracking-tight font-light text-white leading-6">{{ $product->description }}</p>
        </div></a>
    @endforeach
</div>

