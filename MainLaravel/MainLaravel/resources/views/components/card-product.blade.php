{{-- <div>        
    <div class="container my-12 mx-auto px-4 md:px-12">

        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            
            @foreach ($products as $product)

            <!-- Column -->
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
    
                <!-- Article -->
                <article class="overflow-hidden rounded-lg shadow-lg">
    
                    <a href="{{ route('read_more' , $product) }}">
                        <img alt="Placeholder" class="block h-auto w-full" src="{{ asset($product->image_url) }}">
                    </a>
    
                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="#">
                                {{ $product -> name }}
                            </a>
                        </h1>
                        <p class="text-grey-darker text-sm">
                            14/4/19
                        </p>
                    </header>
    
                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                        <a class="flex items-center no-underline hover:underline text-black" href="#">
                            <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                            <p class="ml-2 text-sm">
                                {{ $product -> price }}
                            </p>
                        </a>
                        <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                            <span class="hidden">Like</span>
                            <i class="fa fa-heart"></i>
                        </a>
                    </footer>
    
                </article>
                <!-- END Article -->
    
            </div>
            <!-- END Column -->

            @endforeach
            {{ $products -> links() }}
        </div>
    </div>
</div>
 --}}


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


{{-- <div class="relative flex min-h-screen flex-col justify-center bg-gradient-to-r from-rose-100 to-teal-100">
    <!-- card -->
    <div class="mx-auto flex w-96 flex-col justify-center bg-white rounded-2xl shadow-xl shadow-slate-300/60">
      <!-- img -->
      <img class="aspect-video w-96 rounded-t-2xl object-cover object-center" src="https://images.pexels.com/photos/3311574/pexels-photo-3311574.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1260&amp;h=750&amp;dpr=1">
      <!-- text information -->
      <div class="p-4">
        <small class="text-blue-400 text-xs">Automobile company</small>
        <h1 class="text-2xl font-medium text-slate-600 pb-2">Dodge Car</h1>
        <p class="text-sm tracking-tight font-light text-slate-400 leading-6">Dodge is an American brand of automobiles and a division of Stellantis, based in Auburn Hills, Michigan..</p>
      </div>
    </div>
  </div> --}}
