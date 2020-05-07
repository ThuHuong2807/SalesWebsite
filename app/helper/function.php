<?php
//hàm show cate ở select option category
function GetCategory($mang,$parent,$shift,$active)
{
	foreach($mang as $row)
	{
		if($row->category_parent==$parent)
		{
            if($row->category_id==$active)
            {
                echo "<option selected value='$row->category_id'>".$shift.$row->category_name.'</option>';
            }
            else
            {
                echo "<option value='$row->category_id'>".$shift.$row->category_name.'</option>';
            }
			GetCategory($mang,$row->category_id,$shift.'---|',$active);
		}
	}
}
//hàm show category ở add và edit category
function ShowCategory($mang,$parent,$shift)
{
	foreach($mang as $row)
	{
		if($row->category_parent==$parent)
		{
            
            echo"
                <div class='item-menu'><span>".$shift.$row->category_name."</span>
                <div class='category-fix'>
                <a class='btn-category btn-primary' href='admin/category/edit-category/".$row->category_id."'><i class='fas fa-edit'></i></a>
                <a onclick='return del_cate()' class='btn-category btn-danger' href='admin/category/delete-category/".$row->category_id."'><i class='fas fa-times'></i></a>
                </div>
                </div>";
			ShowCategory($mang,$row->category_id,$shift.'---|');
		}
	}
}
//input $mang=$product->values output::array('size'=>array(s,m),'color'=>array('đỏ','xanh'))
///hàm show thuộc tính và giá trị thuộc tính
function attr_values($product)
{
	$result=array();
    foreach($product as $value)
    {
        $key=$value->attribute->attribute_name;
        $result[$key][]= $value->values_value;
    }
    return $result;
}
//input: array('size'=>array(1,2),'color'=>array(4))   output: array(array(1,4),array(2,4));
//hàm ghép tạo các biến thể 
function get_combinations($arrays) {
	$result = array(array());
	foreach ($arrays as $property => $property_values) {
		$tmp = array();
		foreach ($result as $result_item) {
			foreach ($property_values as $property_value) {
				$tmp[] = array_merge($result_item, array($property => $property_value));
			}
		}
		$result = $tmp;
	}
	return $result;
}
//kiểm tra check value input values in edit product 
function check_value($product,$value_check)
{
	
	foreach ($product->values as $value) {
		if($value->values_id==$value_check)
		{
			return true;
		}
	}
	return false;

}
//kiểm tra biến thể trong edit product
function check_var($product,$array)
{
	foreach($product->variant as $row)
	{
		$mang=array();
		foreach ($row->values as $value) {
			$mang[]=$value->values_id;
		}
		if(array_diff($mang,$array)==NULL)
		{
			return false;
		}
	}
	return true;
}
//input 1 san pham xac dinh và 1 array chứa giá trị thuộc tính ,out: giá theo thuộc tính
function getprice($product,$array)
{
    foreach($product->variant as $row)
    {
            $mang=array();
            foreach($row->values as $value)
            {
                $mang[]=$value->values_value;
            }
            if(array_diff($mang,$array)==NULL)
            {
                if($row->vartiant_price==0)
                {
                    return $product->product_price;
                }
                return $row->variant_price;
            }
    }
    return $product->product_price;
}
