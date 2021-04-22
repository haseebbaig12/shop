<?php


namespace App\Http\Controllers;
namespace App\Http\Controllers\Backend\Menu;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\menuControllers;
use App\Models\Category;
use App\Models\Pages;
use App\Models\Posts;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd('Welcome      to      Karachi');
        $data['category']=Category::where('status',1)->get();
        $data['pages']=Pages::where('status',1)->get();
        $data['post']=Posts::where('status',1)->get();
        $data['product']=Product::where('status',1)->get();
        $data['print_menu'] = $this->print_menu('false');
        // $data['menu_data']= json_encode(Menu::get());

        // $data['menu_data_json']=menuControllers::where('id',1)->get();
        // dd($data['menu_data_json']);
        

        return view('backend.menu.index',compact('data'));

    }
    public function get_menus_by_parent_id($id)
    {
        $query =  Menu::where('parent_Id', $id )->where('status',1)->orderBy('sort_Id', 'asc')->get();
        return $query;
    }
    public function print_menu($onajax,$id= 0) 
	{
        
		$data = $this->get_menus_by_parent_id($id);
		if(!isset($html)){$html="";}
		
		$html.= '<ol class="dd-list">';
       
		foreach($data as $row){ 
            // dd($data);
		    $html.= '<li class="dd-item" sort-id="'.$row->sort_id.'" data-id="'.$row->id.'">';	
            if($onajax == 'true'){
                $html.='<button data-action="collapse" type="button">::before Collapse</button>
                <button data-action="expand" type="button" style="display: none;">Expand</button>';	
            }				
			$html.='<div class="dd-handle"><span>'.$row->itemTitle.'</span></div>';
            $html.='<a style="    position: relative;
                z-index: 100;
                float: right;
                margin-top: -30px;
                margin-right: 10px;" target="_blank"  href="">Edit</a>';
                if($onajax == 'true'){
                    $html.= $this->print_menu('true' , $row->id);;	
                }else{
                    $html.= $this->print_menu('false' , $row->id);
                } 
			
			$html.= "</li> ";
		}
		$html.= "</ol> ";
        // dd($html);
		return $html;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_json($array)
	{
        // $post = $array;
        $post = json_decode($array);	
        // dd($post);
		$data = array();
		foreach($post as $row)
		{
            // dd($row);
            $row = (array) $row;
           

			$data[0][] = $row['id'];
			if(isset($row['children']))
			{ 
				foreach($row['children']  as $row1)
				{ 
                    $row1 = (array) $row1;
					$data[$row['id']][] = $row1['id'];
					if(isset($row1['children']))
					{
						foreach($row1['children']  as $row2)
						{  $row2 = (array) $row2;
								$data[$row1['id']][] = $row2['id'];
								if(isset($row2['children']))
								{
									foreach($row2['children']  as $row3)
									{$row3 = (array) $row3;
											$data[$row2['id']][] = $row3['id']; 
									}
								}
						}
					}
				}
			}
		}
        
		
		foreach ( $data as $key => $value)
			if(isset($value))
			{
				$data = array(
								'parent_id' => $key 				, 
								'id' 		=> implode(",",$value)
							 );
				$array1 = explode(",",implode(",",$value));
				foreach ($array1 as $key1 => $value1 )
				{
					$data1 = array(
									'sort_id' => $key1		,
									'id'		 => $value1
								 );
					 $this->change_menu_sort_order($data1);
					
				
				}
                // dd($array1);
                $this->change_menu_hierarchy($data);
				
			}
	}

    // public function get_menus_by_parent_id($id)
    // {
    //     $query = $this->db->query("select * from admin_module_list where is_enable=1 and parent_id = ".$id." order by sort_order");
    //     return $query->result(); 
    // }
    
    public function change_menu_hierarchy($data)
    {
        $data2 = [
            'parent_id'=>$data['parent_id']
        ];
        $query = Menu::whereIn('id',explode(',',$data['id']))->update($data2);
        return Menu::whereIn('id',explode(',',$data['id']))->update($data2);
        // "update admin_module_list  set parent_id = ".$data['parent_id']." where id in (".$data['id'].")   ";
    }
    public function change_menu_sort_order($data)
    {
        
        // dd($data);
        $data2 = [
            'sort_id' => $data['sort_id']
        ];
        $query = Menu::whereIn('id',explode(',',$data['id']))->update($data2);
        return Menu::whereIn('id',explode(',',$data['id']))->update($data2);
    }
    // public function get_rights_by_id($data)
    // {
    //     $query = $this->db->query("select * from  admin_roles_list where id=".$data['id']);
    //     return $query; 
    // }


    public function store(Request $request)
    {
        // save krna ka liya  //ok //updat akahan ho ga ? yahi to puch raha ho
        // knsa route hit kro

        if($request['__data']){

        
            $a=$request['__data'];
            $a=json_decode($a);
            // dd($a);
            foreach ($a as $key => $value) {
                $data=[
                    'sort_id' => $value->sort_id,
                    'itemID' => $value->itemID,
                    'itemTitle' => $value->itemTitle,
                    'itemUrl' => $value->itemUrl,
                ];
                $menu = Menu::create($data);
                // dd($menu);
            }
            // dd($this->print_menu());
            return json_encode($this->print_menu('true'));
        }elseif ($request['__dataJson']) {
            $a=$request['__dataJson'];
            $check = $this->get_json($request['__dataJson']);
            $data=[
                'Sort_Array' => $a,
            ];
            // dd($data);
            $menu = menuControllers::where('id',1)->update($data);
        }
    }
    
   public function show(MenuController $menuController)

    {
        //
    }

  
    public function edit(MenuController $menuController)

    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //     public function update(Request $request, $id)

    //      * @param  \App\Models\MenuController  $menuController
    //      * @return \Illuminate\Http\Response
    //      */
    public function update(Request $request)

    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(MenuController $menuController)
    {

    }

    


}

	