<?php

class GoogleCtl
{

  function __construct()
  {

  }

  public static function CreateTXT($res=array())
  {
    $txt="id|title|brand|description|link|image_link|price|condition|availability\n";
    foreach($res["products"] as $product)
    {
      $id=$product["id"];
      $title=$product["attributes"]["name"]["value"];
      $brand=$product["attributes"]["vendor"]["value"];
      $description=$product["attributes"]["short_description"]["value"];
      if($product["permalink"]!="")
      {
        $link=BASE_URL.$product["permalink"];
      }
      else {
        $link=BASE_URL.$product["id"];
      }
      $image_link=$product["attributes"]["img1"]["value"];
      $price=$product["attributes"]["price"]["value"];
      $condition="new";
      $availability=$product["availability_label"];
      if($availability=="success")
      {
        $availability="in stock";
      }
      else {
        $availability="out of stock";
      }
      $txt.=$id."|".$title."|".$brand."|".$description."|".$link."|".$image_link."|".$price." EUR|".$condition."|".$availability."\n";
    }
    return($txt);
  }

}

?>
