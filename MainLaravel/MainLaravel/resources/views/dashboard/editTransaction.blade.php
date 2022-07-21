@extends('dashboard.base')

@section('body')
    <div class="max-w-sm mx-auto px-6">
            <div class="relative flex flex-wrap">
                <div class="w-full relative">
                    <div>
                        <div style="margin-top: 40%">
                            <div class="mx-auto max-w-lg ">
                                <div class="py-1">
                                    <span class="px-1 text-sm text-gray-600">Delivery Name</span>
                                    <input value="{{ $tran->delivery_name }}" placeholder="" type="text"
                                        class="text-md block px-3 py-2 rounded-lg w-full
                    bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" readonly>
                                </div>
                                <div class="py-1">
                                    <span class="px-1 text-sm text-gray-600">Postal Code</span>
                                    <input value="{{ $tran->postal_code }}" placeholder="" type="text" x-model="password"
                                        class="text-md block px-3 py-2 rounded-lg w-full
                    bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" readonly>
                                </div>
                                <div class="py-1">
                                    <span class="px-1 text-sm text-gray-600">Token</span>
                                    <input value="{{ $tran->token }}" placeholder="" type="text" x-model="password"
                                        class="text-md block px-3 py-2 rounded-lg w-full
                    bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" readonly>
                                </div>
                                <div class="py-1">
                                    <div class="mr-1">
                                        <span class="px-1 text-sm text-gray-600">Address</span>
                                        <input value="{{ $tran->address }}" placeholder="" type="text"
                                            class="text-md block px-3 py-2 rounded-lg w-full
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" readonly>
                                    </div>
                                </div>
                                <div class="py-1">
                                    <div class="mr-1">
                                        <span class="px-1 text-sm text-gray-600">Description</span>
                                        <input value="{{ $tran->description }}" placeholder="" type="text"
                                            class="text-md block px-3 py-2 rounded-lg w-full
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" readonly>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <span class="px-1 text-sm text-gray-600">Price</span>
                                      <input value="{{ $tran->price }}" class="text-md block px-3 py-2 rounded-lg w-full
                                      bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" id="price" type="text" readonly>
                              
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                    <span class="px-1 text-sm text-gray-600">Discount</span>
                                      <input value="{{ $tran->discount }}" class="text-md block px-3 py-2 rounded-lg w-full
                                      bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none" id="dis" type="text" readonly>                              
                                    </div>
                                  </div>

                                @role('Admin')

                                    <a href="{{ route('transactions.index') }}"><button class="text-lg font-semibold
                                        bg-gray-800 w-full text-white rounded-lg
                                        px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                                                            Back
                                                        </button></a>
                                @endrole
                                @role('User')

                                    <a href="{{ route('userTran') }}"><button class="text-lg font-semibold
                                        bg-gray-800 w-full text-white rounded-lg
                                        px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                                                            Back
                                                        </button></a>
                                @endrole

                            </div>
                        </div>


                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
<script src="https://unpkg.com/create-file-list"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@endsection