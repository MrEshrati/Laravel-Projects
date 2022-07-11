@extends('dashboard.base')

@section('body')

<form style="margin-top: 5%" action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('POST')
  <div class="flex justify-center my-6">
    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
      <div class="flex-1">
        <table class="w-full text-sm lg:text-base" cellspacing="0">
          <thead>
            <tr class="h-12 uppercase">
              <th class="hidden md:table-cell"></th>
              <th class="text-left">Product</th>
              <th class="lg:text-right text-left pl-5 lg:pl-0">
                <span class="lg:hidden" title="Quantity">Qtd</span>
                <span class="hidden lg:inline">Quantity</span>
              </th>
              <th class="hidden text-right md:table-cell">Unit price</th>
              <th class="text-right">Total price</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($carts as $cart)
              
              <tr>
                <td class="hidden pb-4 md:table-cell">
                  <a href="#">
                    <img src="{{ $cart->digital_content->image_url }}" class="w-20 rounded" alt="Thumbnail">
                  </a>
                </td>
                <td>
                    <p class="mb-2 md:ml-4">{{ $cart->digital_content->name }}</p>
                      <a href="{{ route('cart.delete' , $cart->digital_content->id) }}" class="text-gray-700 md:ml-4">
                        <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt" class="w-4 text-red-600 hover:text-red-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z"/></svg>
                      </a>
                </td>
                <td class="justify-center md:justify-end md:flex mt-6">
                  <div class="w-20 h-10">
                    <div class="relative flex flex-row w-full h-8">
                      <a href="{{ route('addCart' , $cart->digital_content) }}">  
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22H20A2,2 0 0,0 22,20V12A10,10 0 0,0 12,2M13,7H11V11H7V13H11V17H13V13H17V11H13V7Z" />
                        </svg> 
                      </a>  
                      <input type="number" id="CountInput" value="{{ $cart->count }}" 
                        class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                      <a href="{{ route("cart.decrease" , $cart->digital_content) }}">
                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M17,13H7V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                        </svg>
                      </a>  
                    </div>
                  </div>
                </td>
                <td class="hidden text-right md:table-cell">
                  <span class="text-sm lg:text-base font-medium">
                    {{ $cart->price }}
                  </span>
                </td>
                <td class="text-right">
                  <span class="text-sm lg:text-base font-medium">
                    {{ $cart->PriceCalculate() }}
                  </span>
                </td>
              </tr> 

            @endforeach

          </tbody>
        </table>
        <hr class="pb-6 mt-6">
        <div class="my-4 mt-6 -mx-2 lg:flex">
          <div class="lg:px-2 lg:w-1/2">
            <div class="p-4 bg-gray-100 rounded-full">
              <h1 class="ml-2 font-bold uppercase">Delivery Information</h1>
            </div>
            <div class="p-4">
              <div class="justify-center">
                <div>
                  <span class="px-1 text-sm text-gray-600">Delivery Name</span>
                  <input name="delivery_name" placeholder="" type="text"
                      class="text-md block px-3 py-2 rounded-lg w-full
  bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                  @if($errors -> has('delivery_name'))

                      <p class="text-red-600 text-xs italic">{{ $errors -> first('delivery_name') }}</p>

                  @endif
              </div>
              <div>
                <span class="px-1 text-sm text-gray-600">Address</span>
                <input name="address" placeholder="" type="address"
                    class="text-md block px-3 py-2 rounded-lg w-full
bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                @if($errors -> has('address'))

                    <p class="text-red-600 text-xs italic">{{ $errors -> first('address') }}</p>

                @endif
              </div>
              <div>
                <span class="px-1 text-sm text-gray-600">Postal Code</span>
                <input name="postal_code" placeholder="" type="text"
                    class="text-md block px-3 py-2 rounded-lg w-full bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                @if($errors -> has('postal_code'))

                    <p class="text-red-600 text-xs italic">{{ $errors -> first('postal_code') }}</p>

                @endif
              </div>                          
              </div>
            </div>
            <div class="p-4 mt-6 bg-gray-100 rounded-full">
              <h1 class="ml-2 font-bold uppercase">Instruction for seller</h1>
            </div>
            <div class="p-4">
              <p class="mb-4 italic">If you have some information for the seller you can leave them in the box below</p>
              <textarea name="description" class="w-full h-24 p-2 bg-gray-100 rounded"></textarea>
            </div>
          </div>
          <div class="lg:px-2 lg:w-1/2">
            <div class="p-4 bg-gray-100 rounded-full">
              <h1 class="ml-2 font-bold uppercase">Order Details</h1>
            </div>
            <div class="p-4">
                <div class="flex justify-between border-b">
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-700">
                    Total
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    {{-- {{ $prices - $cart->DiscountCalculate() }} --}}
                    {{ $prices }}
                  </div>
                </div>
                  <div class="flex justify-between pt-4 border-b">
                    <div class="flex lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-gray-800">
                      Disocunts
                    </div>
                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-green-600">
                      {{-- {{ $prices - $cart->DiscountCalculate() }} --}}
                      {{ $discounts }}
                    </div>
                  </div>
                  <div class="flex justify-between pt-4 border-b">
                    <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                      New Total
                    </div>
                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                      {{-- {{ $prices - $cart->DiscountCalculate() }} --}}
                      {{ $prices - $discounts }}
                    </div>
                  </div>
                  <button style="transition: 0.2s ease-in-out" type="submit" class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                    <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/></svg>
                    <span class="ml-2 mt-5px">Procceed to checkout</span>
                  </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>  
@endsection