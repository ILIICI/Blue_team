<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductTag;
use App\Http\Controllers\TagController;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $search;
    public $checkbox;

    public function render()
    {
        return view('livewire.dashboard', [
            'tags' => $this->showTags() , 
            'groupedProducts' => $this->filter($this->checkbox, $this->search)
        ]);
    }
    public function showTags()
    {
        return (new TagController)->getAllTags();
    }

    public function filter($tag = null, $search = null)
    {

        if (!is_null($tag) && !($tag == 0) && !is_null($search))
        {
            return $this->search_Tag_Filter($tag, $search);
        }
        if (!is_null($tag) && !($tag == 0))
        {
            return $this->tagFilter($tag);
        }
        if (!is_null($search) && ($tag == 0))
        {
            return $this->searchFilter($search);
        }
        if (!is_null($search))
        {
            return $this->searchFilter($search);
        }

        return (new Product)->simplePaginate(12);
    }

    private function searchFilter($word)
    {
        return (new Product)->where('product_title', 'LIKE', "%$word%")->simplePaginate(12);
    }

    private function tagFilter($id)
    {
        $product_id = (new ProductTag)->where('tag_id', $id)->get('product_id');
        return (new Product)
            ->whereIn('id', $product_id)->simplePaginate(12);
    }

    private function search_Tag_Filter($tagid, $searchword)
    {
        $product_id = (new ProductTag)->where('tag_id', $tagid)->get('product_id');
        return (new Product)
            ->whereIn('id', $product_id)->where(function ($query) use ($searchword)
        {
            $query->where('product_title', 'LIKE', "%$searchword%");
        })->simplePaginate(12);
    }
}

