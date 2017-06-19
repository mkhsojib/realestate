<?php
function getSettings($setting_name = 'site_name')
{
    return \App\SiteSettings::where('name_setting', $setting_name)->first()->value;
}

function image_exist($image_name = '', $imagePath = '/public/building_images/', $url = '/building_images/')
{
    if($image_name != '')
{
        $path = base_path() . $imagePath . $image_name;
        if(file_exists($path)){
            return Request::root() . $url . $image_name;
        }
    }

    return getSettings('no_image');
}

function uploadImage($request, $path = '/public/building_images/', $width = '650', $height = '450', $delete_file = '')
{
    if($delete_file != '')
{
        deleteimage(base_path() . $path . '/' . $delete_file);
    }
    
    getimagesize($request);
    
    $file_name = $request->getClientOriginalName();
    
    $request->move(base_path() . $path, $file_name);
    
    if($width == '650' AND $height == '450')
{
        $thumbnail_path = base_path() . '/public/thumbnail';
        $new_thumbnail_path = $thumbnail_path . $file_name;

        \Intervention\Image\Facades\Image
            ::make(base_path() . $path . '/' . $file_name)
            ->resize('650', '450')
            ->save($new_thumbnail_path, 100);

        if($delete_file != '')
{
            deleteimage(base_path() . $path . '/' . $delete_file);
        }
    }

    return $file_name;
}

function building_type()
{
    $array = [
        'شقة',
        'فيلا',
        'شاليه'
    ];

    return $array;
}

function building_rent()
{
    $array = [
        'تمليك',
        'إيجار'
    ];

    return $array;
}

function status()
{
    $array = [
        'غير مفعل',
        'مفعل'
    ];

    return $array;
}

function room_numbers()
{
    $array = [];

    for($i = 2; $i <= 100; $i++){
        $array[$i] = $i;
    }

    return $array;
}

function field_name()
{
    return[
        'building_price' => 'سعر العقار',
        'rooms' => 'عدد الغرف',
        'building_type' => 'نوع العقار',
        'building_rent' => 'نوع العملية',
        'building_area' => 'المساحة',
        'building_price_from' => 'سعر العقار من',
        'building_price_to' => 'سعر العقار الي',
    ];
}

function contacts()
{
    return [
        '1' => 'خدمة العملاء',
        '2' => 'اقتراح'
    ];
}

function unread_message()
{
    return \App\Contact::where('contact_view', 0)->get();
}

function count_messages()
{
    return \App\Contact::where('contact_view', 0)->count();
}

function set_class($array, $class = 'active')
{
    if(!empty($array)){
        $segment_array = [];

        foreach ($array as $key => $url) {
            if(Request::segment($key+1) == $url)
{
                $segment_array[] = $key;
            }
        }

        if(count($segment_array) == count(Request::segments())){
            if(isset($segment_array[0])){
                return $class;
            }
        }
    }
}

function count_buildings($status, $user_id)
{
    return \App\Building::where('status', $status)->where('user_id', $user_id)->count();
}

function count_inactive_buildings($status)
{
    return \App\Building::where('status', $status)->count();
}