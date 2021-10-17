<div class="space-y-1">
    <h2 class="text-sm font-semibold tracking-widest uppercase text-coolGray-600">Shopping Cart</h2>
    <div class="flex flex-col space-y-1">
        <x-flash::message />
        @if ($counter == 0)
        <p class="text-red-600">Shopping cart is empty</p>
        @else
        <p>Items ({{ $counter}})</p>
        <table class="table-fixed">
            <tbody>
                @foreach ($content as $item )
                <tr>
                    <td class="text-left text-xs">{{$item->name}}</td>
                    <td class="text-xs">{{$item->qty}}</td>
                    <td class="text-xs">{{$item->price}}</td>
                    <td class="text-lg text-green-500">
                        <button wire:click="increment('{{ $item->rowId}}','{{ $item->qty}}')">+</button>
                    </td>
                    <td class="text-lg text-yellow-500">
                        <button wire:click="decrement('{{ $item->rowId}}','{{ $item->qty}}')">-</button>
                    </td>
                    <td class="text-lg text-red-500">
                        <button wire:click="remove('{{ $item->rowId}}')">x</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p>Total Price : {{ $priceTotal}}</p>
        @endif
    </div>
</div>

