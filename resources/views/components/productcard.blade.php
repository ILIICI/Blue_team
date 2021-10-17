<div class="flex flex-wrap  pl-5 pr-5 overflow-hidden">
    @foreach ($groupedProducts as  $products)
    <div class="my-1 px-1 w-1/3 overflow-hidden">
        <div class="bg-white p-3">
            <div class="h-200 shadow-lg hover:shadow-xl transform transition duration-500 hover:scale-105">
                <div class="px-4 py-2 " style="height: 300px">
                    <h1 class="text-xl font-gray-500 font-bold">{{ $products->product_title }}</h1>
                    <div class="flex justify-center">
                        <img class="object-cover w-32 h-32 mr-2 rounded-full" 
                                src="{{ $products->product_imgURL }}" alt="Card image"/>
                    </div>
                    <p class="text-sm tracking-normal overflow-hidden " 
                    style="display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;">
                        {{ $products->product_description }}</p>
                    <div class="mt-2 flex" style="flex-flow: row wrap; height:40px">
                        @foreach ($products->tags as $tag )
                        <div class="text-xs m-1 inline-flex items-center font-bold leading-sm 
                                    uppercase px-1 py-1 bg-blue-200 text-blue-700 rounded-full">
                            {{ $tag->tag_title }}
                        </div>
                        @endforeach
                    </div>
                    <div class="flex justify-center ">
                        <p class="card-price px-3 align-baseline inline-block 
                                    w-auto h-10 bg-green-500 rounded-xl ml-5 relative 
                                    text-white font-light text-xl leading-9">
                                    {{ $products->product_price/100 }} £
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>