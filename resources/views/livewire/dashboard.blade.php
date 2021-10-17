<div class="flex flex-wrap overflow-hidden">
    <!-- Left Side Start-->
    <div class="w-4/5 overflow-hidden">
        <div class="flex flex-wrap  pl-5 pr-5 overflow-hidden">
            @foreach ($groupedProducts as $product)
            <!-- Product Card Start-->
            <div class="my-1 px-1 w-1/3 overflow-hidden">
                <div class="bg-white p-3">
                    <div class="h-300 shadow-lg hover:shadow-xl transform transition duration-500 hover:scale-105">
                        <div class="px-4 py-2 h-62">
                            <h1 class="text-xl font-gray-700 font-bold">{{ $product->product_title }}</h1>
                            <div class="flex justify-center">
                                <img class="object-cover w-20 h-20 mr-2 rounded-full" 
                                        src="{{ $product->product_imgURL }}" alt="Card image"/>
                            </div>
                            <p class="text-sm tracking-normal overflow-hidden" style="
                                display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;">{{ $product->product_description }}</p>
                            <div class="mt-2 flex h-10">
                                @foreach ($product->tags as $tag )
                                <div class="text-xs m-1 inline-flex items-center font-bold leading-sm 
                                    uppercase px-1 py-1 bg-blue-200 text-blue-700 rounded-full">
                                    {{ $tag->tag_title }}
                                </div>
                                @endforeach
                            </div>
                            <div class="flex justify-between ">
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                                    <button type="submit" class="flex justify-center mt-6 px-3 bg-blue-400 p-2
                                                                rounded-lg">Add</button>
                                </form>
                                <p class="card-price mt-6 px-3 align-baseline inline-block 
                                        w-auto h-10 bg-blue-400 rounded-xl ml-5 relative 
                                        text-white font-light text-xl leading-9">
                                    {{ number_format($product->product_price/100,2) }} £
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Card End-->
            @endforeach
        </div>
        <div class="mx-auto pb-4 w-1/4">
            {{ $groupedProducts->links() }}
        </div>
    </div>
    <!-- Left Side Ends-->

    <!-- Right Side Start-->
    <div class="w-1/5 overflow-hidden pt-6 ">
        <aside class="w-full h-full text-center p-6 bg-gray-50 text-gray-800 rounded-lg">
            <nav class="space-y-8 text-sm">
                <!-- Cart Start-->
                    @livewire('cart')
                <!-- Cart Ends-->
                <!-- Search Start-->
                <div class="justify-right overflow-hidden">
                    <div class="text-center">
                        <input class="w-full text-gray-500 rounded p-2" type="text" wire:model="search" placeholder="Search by product title">
                    </div>
                </div>
                <!-- Search End-->
                <!-- Tag Filter Start-->
                <div class="space-y-2">
                    <h2 class="text-sm font-semibold tracking-widest uppercase text-gray-600">Filter</h2>
                    <div class="flex flex-col space-y-1">
                        <div class="block">
                            <div class="mt-2 flex justify-start">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" value="0" type="radio" name="checkbox" wire:model="checkbox">
                                    <label class="form-check-label ps-2">Clear</label>
                                </div>
                            </div>
                            @foreach ($tags as $item)
                            <div class="mt-2 flex justify-start">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" value="{{ $item->id }}" type="radio" name="checkbox" id="checkbox.{{ $item->id }}" wire:model="checkbox">
                                    <label class="form-check-label ps-2">
                                    {{ $item->tag_title }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Tag Filter End-->
            </nav>
        </aside>
    </div>
    <!-- Right Side End-->
</div>

