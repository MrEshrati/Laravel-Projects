@extends('dashboard.base')

@section('body')
<script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>

<section class="antialiased w-screen bg-gradient-to-r from-rose-100 to-teal-100 text-gray-600 h-screen px-4" x-data="app">
    <div class="flex flex-col justify-center h-full">
        <!-- Table -->
        <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <div class="font-semibold text-gray-800">Transaction Cart</div>
            </header>

            <div class="overflow-x-auto p-3">
                <table class="table-auto w-full">
                    <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                        <tr>
                            <th class="p-2"></th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Product Name</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Quantity</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Total</div>
                            </th>
                            <th class="p-2">
                                <div class="font-semibold text-left">Discount</div>
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody class="text-sm divide-y divide-gray-100">
                            
                        @foreach ($invoice as $inv)
                            <tr>
                                <td class="p-2">
                                    <a href="{{ route('read_more' , $inv->digital_content) }}">
                                        <img src="{{ $inv->digital_content->image_url }}" class="w-20 rounded" alt="Thumbnail">
                                    </a>
                                </td>
                                <td class="p-2">
                                    <div class="font-medium text-gray-800">
                                        {{ $inv->digital_content->name }}
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="text-left">{{ $inv->count }}</div>
                                </td>
                                <td class="p-2">
                                    <div class="text-left font-medium text-gray-500">
                                        {{ $inv->price }}
                                    </div>
                                </td>
                                <td class="p-2">
                                    <div class="text-left font-medium text-green-500">
                                        {{ $inv->discount }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- total amount -->
            <div class="flex justify-end font-bold space-x-4 text-2xl border-t border-gray-100 px-5 py-4">
                <div>Total</div>
                <div class="text-blue-600">{{ $allPrice - $allDiscount }}</div>
            </div>

            <div class="flex justify-end">
                <!-- send this data to backend (note: use class 'hidden' to hide this input) -->
                <input type="hidden" class="border border-black bg-gray-50" x-model="selected" />
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("app", () => ({
            total: 0,
            selected: [],

            toggleCheckbox(element, amount) {
                if (element.checked) {
                    this.selected.push(element.value);
                    this.total += amount;
                } else {
                    const index = this.selected.indexOf(element.value);

                    if (index > -1) this.selected.splice(index, 1);

                    this.total -= amount;
                }
            },
        }));
    });
</script>
@endsection