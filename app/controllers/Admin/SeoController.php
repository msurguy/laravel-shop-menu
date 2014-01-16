<?php

class AdminSeoController extends \BaseController {

	protected $layout = 'layout';

	protected $type;

	public function __construct(){
		$this->type = Input::get('type','products');
	}

	public function index()
	{
		switch ($this->type) {
			case 'categories':
				$list = Category::with('seo')->get(array('id','name'));
				break;
			default:
				$list = Product::with('seo')->get(array('id','name'));
				break;
		}

		$this->layout->content = View::make('admin.seo.list', array('type' => $this->type, 'list' => $list));
	}

	public function create()
	{
		$itemID = Input::get('id');
		$item = $this->getItem($this->type, $itemID);
		$this->layout->content = View::make('admin.seo.edit', array('type' => $this->type, 'item'=>$item));
	}

	public function store()
	{
		$itemID = Input::get('id');

		$item = $this->getItem($this->type, $itemID);

		$seo = new Seo;
		$seo->updateFromInput();
		$item->seo()->save($seo);

		return Redirect::to('admin/seo/'.$seo->id.'/edit?type='.$this->type.'&id='.$itemID)->with('seo_created', true);
	}

	public function edit($id)
	{
		$itemID = Input::get('id');
		$item = $this->getItem($this->type, $itemID);
		$seo = Seo::find($id);		

		$this->layout->content = View::make('admin.seo.edit', array('type' => $this->type, 'seo' => $seo,'item'=>$item));
	}

	public function update($id)
	{
		$seo = Seo::find($id);

		$itemID = Input::get('id');

		$seo->updateFromInput();

 		return Redirect::to('admin/seo/'.$id.'/edit?type='.$this->type.'&id='.$itemID)->with('seo_updated', true);;
	}

	public function getItem($type, $itemID)
	{
		switch ($type) {
			case 'categories':
				$item = Category::whereId($itemID)->get(array('id','name'))->first();
				break;
			default:
				$item = Product::whereId($itemID)->get(array('id','name'))->first();
				break;
		}
		
		return $item;
	}

}