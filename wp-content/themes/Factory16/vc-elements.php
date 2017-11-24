<?php 
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//                VC ELEMENTS FOR PAGES
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////
//                       1 TEXT COLUMN
////////////////////////////////////////////////////////////
add_shortcode( 'onecol', 'one_col_function' );
function one_col_function( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'onecol_h2' => '', 'onecol_symbol' => '', 'onecol_remark' => '', 'onecol_content' => ''
    ), $atts ) );
   
    $contents = '
            <div class="column col-sm-12">
                <div class="content-inner basic-padding-sides">';
                
    if (!empty(${onecol_h2})) {
        if (!empty(${onecol_remark})) {
            $contents .= '<span data-note="' . ${onecol_remark} . '"><h2 class="runner"><span class="running-number">' . ${onecol_h2} . '</span>'. ${onecol_symbol} .'</h2></span>';
        }
        else 
            $contents .= '<h2 class="runner"><span class="running-number">' . ${onecol_h2} . '</span>'. ${onecol_symbol} .'</h2>';
    }
    
    $contents .= '
                    <div class="basic-text shift-up">
                        <p style="white-space: pre-line">';
    $contents .= $content;
    $contents .= '       </p>
                    </div>
                </div>
            </div>';

   return $contents;
}

add_action( 'vc_before_init', 'one_col_params' );
function one_col_params() {
   vc_map( array(
      "name" => "1 колонка текста",
      "base" => "onecol",
      "class" => "",
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Подзаголовок (h2) колонки",
            "param_name" => "onecol_h2"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Символ после подзаголовка",
            "param_name" => "onecol_symbol"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Примечание колонки",
            "param_name" => "onecol_remark"
         ),
         array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Описание колонки",
            "param_name" => "content",
            "description" => "Для ввода примечаний используйте формат<br>&lt;span data-note='Текст примечания'&gt;примечание&lt;/span&gt; во вкладке Текст"
         )
        )
   ) );
}



////////////////////////////////////////////////////////////
//                       2 TEXT COLUMNS
////////////////////////////////////////////////////////////
add_shortcode( 'twocols', 'two_cols_function' );
function two_cols_function( $atts ) {
    extract( shortcode_atts( array(
      'twocols_head_h2' => '', 'twocols_content_left' => '', 'twocols_content_right' => '', 'twocols_color_bg' => 'white', 'twocols_top' => 'pads-big-top', 'twocols_bottom' => 'pads-big-bottom'
   ), $atts ) );
   
    if (${twocols_top} == 'pads-big-top') $vert = 'vertical';

    $content = '
       <div class="twocols row bg-' . ${twocols_color_bg} . ' element ' . ${twocols_top} . ' ' . ${twocols_bottom} . ' ' . $vert . '">';
       
    if (!empty(${twocols_head_h2})) {
        $content .= '<div class="column col-sm-12 left-padding-m">
                        <div class="content-inner basic-padding-sides">
                            <h2 class="block-title filler-animation">' . ${twocols_head_h2} . 
                            '</h2>
                        </div>
                    </div>';
    }
       
    $col_left = '
            <div class="column col-sm-6 left-padding-m">
                <div class="content-inner basic-padding-sides">
                    <div class="basic-text shift-up">
                        <p style="white-space: pre-line">';
    $col_left .= rawurldecode( base64_decode( strip_tags( ${twocols_content_left} ) ) );
    $col_left .= '      </p>
                    </div>
                </div>
            </div>';
            
            
    $col_right = '
            <div class="column col-sm-6 right-padding-m">
                <div class="content-inner basic-padding-sides">                    <div class="basic-text shift-up">
                        <p style="white-space: pre-line">';
    $col_right .= rawurldecode( base64_decode( strip_tags( ${twocols_content_right} ) ) );
    $col_right .= '      </p>
                    </div>
                </div>
            </div>';
   
   $content .= $col_left . $col_right . '</div>';
   
   return $content;
}

add_action( 'vc_before_init', 'two_cols_params' );
function two_cols_params() {
   vc_map( array(
      "name" => "2 колонки текста",
      "base" => "twocols",
      "class" => "",
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Подзаголовок (h2)",
            "param_name" => "twocols_head_h2"
         ),
         array(
            "type" => "textarea_raw_html",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Описание колонка 1",
            "param_name" => "twocols_content_left",
            "description" => "Для ввода примечаний используйте формат<br>&lt;span data-note='Текст примечания'&gt;примечание&lt;/span&gt; во вкладке Текст"
         ),
         array(
            "type" => "textarea_raw_html",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Описание колонка 2",
            "param_name" => "twocols_content_right",
            "description" => "Для ввода примечаний используйте формат<br>&lt;span data-note='Текст примечания'&gt;примечание&lt;/span&gt;"
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Цвет фона",
            "param_name" => "twocols_color_bg",
            "value" => array( "Белый" => "white", "Серый" => "grey" ),
            "std" => "white",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ сверху",
            "param_name" => "twocols_top",
            "value" => array( "Большой с линией" => "pads-big-top", "Маленький" => "pads-small-top" ),
            "std" => "pads-big-top",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ снизу",
            "param_name" => "twocols_bottom",
            "value" => array( "Большой" => "pads-big-bottom", "Маленький" => "pads-small-bottom" ),
            "std" => "pads-big-bottom",
            "admin_label" => true
         )
      )
   ) );
}


////////////////////////////////////////////////////////////
//                       3 TEXT COLUMNS
////////////////////////////////////////////////////////////
add_shortcode( 'threecols', 'three_cols_function' );
function three_cols_function( $atts ) {
    extract( shortcode_atts( array(
      'threecols_h2_left' => '', 'threecols_symbol_left' => '', 'threecols_remark_left' => '', 'threecols_content_left' => '', 'threecols_h2_center' => '', 'threecols_symbol_center' => '', 'threecols_remark_center' => '', 'threecols_content_center' => '', 'threecols_h2_right' => '', 'threecols_symbol_right' => '', 'threecols_remark_right' => '', 'threecols_content_right' => '',  'threecols_color_bg' => 'white', 'threecols_top' => 'pads-big-top', 'threecols_bottom' => 'pads-big-bottom'
    ), $atts ) );
   
    if (${threecols_top} == 'pads-big-top') $vert = 'vertical';

    $content = '
       <div class="threecols row bg-' . ${threecols_color_bg} . ' element ' . ${threecols_top} . ' ' . ${threecols_bottom} . ' ' . $vert . ' left-padding-m right-padding-m">';
       
    $col_left = '
            <div class="column col-sm-4">
                <div class="content-inner basic-padding-sides">';
                
    if (!empty(${threecols_h2_left})) {
        if (!empty(${threecols_remark_left})) {
            $col_left .= '<span data-note="' . ${threecols_remark_left} . '"><h2 class="runner"><span class="running-number">' . ${threecols_h2_left} . '</span>'. ${threecols_symbol_left} .'</h2></span>';
        }
        else 
            $col_left .= '<h2 class="runner"><span class="running-number">' . ${threecols_h2_left} . '</span>'. ${threecols_symbol_left} .'</h2>';
    }
     
    $col_left .= '
                    <div class="basic-text shift-up">
                        <p style="white-space: pre-line">';
    $col_left .= rawurldecode( base64_decode( strip_tags( ${threecols_content_left} ) ) );
    $col_left .= '      </p>
                    </div>
                </div>
            </div>';
            
       
    $col_center = '
            <div class="column col-sm-4">
                <div class="content-inner basic-padding-sides">';
                
    if (!empty(${threecols_h2_center})) {
        if (!empty(${threecols_remark_center})) {
            $col_center .= '<span data-note="' . ${threecols_remark_center} . '"><h2 class="runner"><span class="running-number">' . ${threecols_h2_center} . '</span>'. ${threecols_symbol_center} .'</h2></span>';
        }
        else 
            $col_center .= '<h2 class="runner"><span class="running-number">' . ${threecols_h2_center} . '</span>'. ${threecols_symbol_center} .'</h2>';
    }
     
    $col_center .= '
                    <div class="basic-text shift-up">
                        <p style="white-space: pre-line">';
    $col_center .= rawurldecode( base64_decode( strip_tags( ${threecols_content_left} ) ) );
    $col_center .= '    </p>
                    </div>
                </div>
            </div>';        
            
            
    $col_right = '
            <div class="column col-sm-4">
                <div class="content-inner basic-padding-sides">';
                
    if (!empty(${threecols_h2_right})) {
        if (!empty(${threecols_remark_right})) {
            $col_right .= '<span data-note="' . ${threecols_remark_right} . '"><h2 class="runner"><span class="running-number">' . ${threecols_h2_right} . '</span>'. ${threecols_symbol_right} .'</h2></span>';
        }
        else 
            $col_right .= '<h2 class="runner"><span class="running-number">' . ${threecols_h2_right} . '</span>'. ${threecols_symbol_right} .'</h2>';
    }
     
    $col_right .= '
                    <div class="basic-text shift-up">
                        <p style="white-space: pre-line">';
    $col_right .= rawurldecode( base64_decode( strip_tags( ${threecols_content_left} ) ) );
    $col_right .= '     </p>
                    </div>
                </div>
            </div>';        
            
   $content .= $col_left . $col_center . $col_right . '</div>';
   
   return $content;
}

add_action( 'vc_before_init', 'three_cols_params' );
function three_cols_params() {
   vc_map( array(
      "name" => "3 колонки текста",
      "base" => "threecols",
      "class" => "",
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Подзаголовок (h2) колонка 1",
            "param_name" => "threecols_h2_left"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Символ после подзаголовка 1",
            "param_name" => "threecols_symbol_left"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Примечание колонка 1",
            "param_name" => "threecols_remark_left"
         ),
         array(
            "type" => "textarea_raw_html",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Описание колонка 1",
            "param_name" => "threecols_content_left",
            "description" => "Для ввода примечаний используйте формат<br>&lt;span data-note='Текст примечания'&gt;примечание&lt;/span&gt; во вкладке Текст"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Подзаголовок (h2) колонка 2",
            "param_name" => "threecols_h2_center"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Символ после подзаголовка 2",
            "param_name" => "threecols_symbol_center"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Примечание колонка 2",
            "param_name" => "threecols_remark_center"
         ),
         array(
            "type" => "textarea_raw_html",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Описание колонка 2",
            "param_name" => "threecols_content_center",
            "description" => "Для ввода примечаний используйте формат<br>&lt;span data-note='Текст примечания'&gt;примечание&lt;/span&gt;"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Подзаголовок (h2) колонка 3",
            "param_name" => "threecols_h2_right"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Символ после подзаголовка 3",
            "param_name" => "threecols_symbol_right"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Примечание колонка 3",
            "param_name" => "threecols_remark_right"
         ),
         array(
            "type" => "textarea_raw_html",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Описание колонка 3",
            "param_name" => "threecols_content_right",
            "description" => "Для ввода примечаний используйте формат<br>&lt;span data-note='Текст примечания'&gt;примечание&lt;/span&gt;"
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Цвет фона",
            "param_name" => "threecols_color_bg",
            "value" => array( "Белый" => "white", "Серый" => "grey" ),
            "std" => "white",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ сверху",
            "param_name" => "threecols_top",
            "value" => array( "Большой с линией" => "pads-big-top", "Маленький" => "pads-small-top" ),
            "std" => "pads-big-top",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ снизу",
            "param_name" => "threecols_bottom",
            "value" => array( "Большой" => "pads-big-bottom", "Маленький" => "pads-small-bottom" ),
            "std" => "pads-big-bottom",
            "admin_label" => true
         )
      )
   ) );
}



////////////////////////////////////////////////////////////
//                     TEXT & PICTURE 
////////////////////////////////////////////////////////////
add_shortcode( 'pictxt', 'pic_txt_function' );
function pic_txt_function( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'pictxt_head_h2' => '', 'pictxt_head_h3' => '', 'pictxt_img' => '', 'pictxt_align' => 'right', 'pictxt_color_bg' => 'white', 'pictxt_top' => 'pads-big-top', 'pictxt_bottom' => 'pads-big-bottom'
    ), $atts ) );
   
    if (${pictxt_top} == 'pads-big-top') $vert = 'vertical';

    $final_content = '
       <div class="pictxt row bg-' . ${pictxt_color_bg} . ' element ' . ${pictxt_top} . ' ' . ${pictxt_bottom} . ' ' . $vert . '">';
       
    $text_col = '
            <div class="column col-sm-6 text-col ' . ${pictxt_align} . '-padding-m">
                <div class="content-inner basic-padding-sides">';
                
    if (!empty(${pictxt_head_h2})) {
        $text_col .= '<h2 class="block-title filler-animation">' . ${pictxt_head_h2} . '</h2>';
    }
            
    if (!empty(${pictxt_head_h3})) {
        $text_col .= '<h3 class="block-subtitle filler-animation">' . ${pictxt_head_h3} . '</h3>';
    }
    
    $content = wpb_js_remove_wpautop($content, true);
    
    $text_col .= '
                    <div class="basic-text shift-up">' . $content . '</div>
                </div>
            </div>';
            
    $image_col = '      
            <div class="column col-sm-6 img-col ' .  ${pictxt_align} . '-padding-s">
                <div class="content-inner">';
   
    $url = wp_make_link_relative(wp_get_attachment_url(${pictxt_img})); 
    $url = substr($url, 1);
    $image = wp_get_image_editor( $url );
    if ( ! is_wp_error( $image ) ) {
        $image->resize( '800' , NULL , true );
    	$saved = $image->save();
    }
    
    $image_col .= ' <img class="img-column" src="/' . $saved['path'] . '" alt="">
        	    </div>
        	</div>';
   
   if (${pictxt_align} == 'left') $final_content .= $text_col . $image_col . '</div>';
   else $final_content .= $image_col . $text_col . '</div>';
   
   return $final_content;
}

add_action( 'vc_before_init', 'pic_txt_params' );
function pic_txt_params() {
   vc_map( array(
      "name" => "Текст и изображение",
      "base" => "pictxt",
      "class" => "",
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Подзаголовок (h2)",
            "param_name" => "pictxt_head_h2"
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Подзаголовок (h3)",
            "class" => "hide_params",
            "param_name" => "pictxt_head_h3"
         ),
         array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Изображение",
            "param_name" => "pictxt_img"
         ),
         array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Описание",
            "param_name" => "content",
            "description" => "Для ввода примечаний используйте формат<br>&lt;span data-note='Текст примечания'&gt;примечание&lt;/span&gt; во вкладке Текст"
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Выравнивание",
            "param_name" => "pictxt_align",
            "value" => array( "Текст справа" => "right", "Текст слева" => "left" ),
            "std" => "right",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Цвет фона",
            "param_name" => "pictxt_color_bg",
            "value" => array( "Белый" => "white", "Серый" => "grey" ),
            "std" => "white",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ сверху",
            "param_name" => "pictxt_top",
            "value" => array( "Большой с линией" => "pads-big-top", "Маленький" => "pads-small-top" ),
            "std" => "pads-big-top",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ снизу",
            "param_name" => "pictxt_bottom",
            "value" => array( "Большой" => "pads-big-bottom", "Маленький" => "pads-small-bottom" ),
            "std" => "pads-big-bottom",
            "admin_label" => true
         )
      )
   ) );
}

////////////////////////////////////////////////////////////
//                     WIDE PICTURE 
////////////////////////////////////////////////////////////
add_shortcode( 'pic', 'pic_function' );
function pic_function( $atts ) {
   extract( shortcode_atts( array(
      'pic_img' => '', 'pic_color_bg' => 'white', 'pic_top' => 'pads-big-top', 'pic_bottom' => 'pads-big-bottom'
    ), $atts ) );
   
    if (${pic_top} == 'pads-big-top') $vert = 'vertical';
    
    
    $url = wp_make_link_relative(wp_get_attachment_url(${pic_img})); 
    $url = substr($url, 1);
    $image = wp_get_image_editor( $url );
    if ( ! is_wp_error( $image ) ) {
        $image->resize( '1600', NULL, true );
    	$saved = $image->save();
    }
    
    $img_desc = get_post( ${pic_img} );
    $img_desc = $img_desc->post_content;
    
    $content = '
       <div class="pic row bg-' . ${pic_color_bg} . ' element ' . ${pic_top} . ' ' . ${pic_bottom} . ' ' . $vert . '">     
            <div class="column col-sm-12">
                <div class="content-inner" style="position: relative">
	                <div class="description"><p>'. $img_desc .'</p></div>
                    <img src="/' . $saved['path'] . '" style="width: 100%; display: block" alt="">
        	    </div>
        	</div>
        </div>';
   
   return $content;
}

add_action( 'vc_before_init', 'pic_params' );
function pic_params() {
   vc_map( array(
      "name" => "Широкое изображение",
      "base" => "pic",
      "class" => "",
      "params" => array(
         array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Изображение",
            "param_name" => "pic_img"
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Цвет фона",
            "param_name" => "pic_color_bg",
            "value" => array( "Белый" => "white", "Серый" => "grey" ),
            "std" => "white",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ сверху",
            "param_name" => "pic_top",
            "value" => array( "Большой с линией" => "pads-big-top", "Маленький" => "pads-small-top" ),
            "std" => "pads-big-top",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ снизу",
            "param_name" => "pic_bottom",
            "value" => array( "Большой" => "pads-big-bottom", "Маленький" => "pads-small-bottom" ),
            "std" => "pads-big-bottom",
            "admin_label" => true
         )
      )
   ) );
}

////////////////////////////////////////////////////////////
//                    QUOTE
////////////////////////////////////////////////////////////
add_shortcode( 'quote', 'quote_function' );
function quote_function( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'quote_top' => 'margins-big-top', 'quote_bottom' => 'margins-big-bottom'
    ), $atts ) );
   
    if (${quote_top} == 'pads-big-top') $vert = 'vertical';

    $contents = '
       <div class="quote row element ' . ${quote_top} . ' ' . ${quote_bottom} . ' ' . $vert . '">     
            <div class="column col-sm-12 left-padding-m right-padding-m quote">
                <div class="content-inner basic-padding-sides">
                    <div class="shift-up">
                        <p style="white-space: pre-line">';
    $contents .= $content;
    $contents .= '      </p>
                    </div>
        	    </div>
        	</div>
        </div>';
   
   return $contents;
}

add_action( 'vc_before_init', 'quote_params' );
function quote_params() {
   vc_map( array(
      "name" => "Цитата",
      "base" => "quote",
      "class" => "",
      "params" => array(
         array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Текст",
            "param_name" => "content"
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ сверху",
            "param_name" => "quote_top",
            "value" => array( "Большой" => "margins-big-top", "Маленький" => "margins-small-top" ),
            "std" => "margins-big-top",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ снизу",
            "param_name" => "quote_bottom",
            "value" => array( "Большой" => "margins-big-bottom", "Маленький" => "margins-small-bottom" ),
            "std" => "margins-big-bottom",
            "admin_label" => true
         )
      )
   ) );
}

////////////////////////////////////////////////////////////
//                    VIDEO
////////////////////////////////////////////////////////////
add_shortcode( 'video', 'video_function' );
function video_function( $atts ) {
   extract( shortcode_atts( array(
      'video_text' => '', 'video_color_bg' => 'white', 'video_top' => 'pads-big-top', 'video_bottom' => 'pads-big-bottom'
    ), $atts ) );
   
    if (${video_top} == 'pads-big-top') $vert = 'vertical';

    $content = '
       <div class="video row element bg-' . ${video_color_bg} . ' ' . ${video_top} . ' ' . ${video_bottom} . ' ' . $vert . '">     
            <div class="column col-sm-12 left-padding-m right-padding-m">
                <div class="content-inner basic-padding-sides">
                    <div class="videoWrapper">';
    $content .= rawurldecode( base64_decode( strip_tags( ${video_text} ) ) );
    $content .= '   </div>
        	    </div>
        	</div>
        </div>';
   
   return $content;
}

add_action( 'vc_before_init', 'video_params' );
function video_params() {
   vc_map( array(
      "name" => "Видео",
      "base" => "video",
      "class" => "",
      "params" => array(
         array(
            "type" => "textarea_raw_html",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Ссылка для вставки (iframe)",
            "param_name" => "video_text"
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Цвет фона",
            "param_name" => "video_color_bg",
            "value" => array( "Белый" => "white", "Серый" => "grey" ),
            "std" => "white",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ сверху",
            "param_name" => "video_top",
            "value" => array( "Большой с линией" => "pads-big-top", "Маленький" => "pads-small-top" ),
            "std" => "pads-big-top",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ снизу",
            "param_name" => "video_bottom",
            "value" => array( "Большой" => "pads-big-bottom", "Маленький" => "pads-small-bottom" ),
            "std" => "pads-big-bottom",
            "admin_label" => true
         )
      )
   ) );
}

////////////////////////////////////////////////////////////
//                       IMAGE SLIDER
////////////////////////////////////////////////////////////
add_shortcode( 'imgslider', 'imgslider_function' );
function imgslider_function( $atts ) {
    extract( shortcode_atts( array(
      'imgslider_images' => '', 'imgslider_color_bg' => 'white', 'imgslider_top' => 'pads-big-top', 'imgslider_bottom' => 'pads-big-bottom'
    ), $atts ) );
   
    if (${imgslider_top} == 'pads-big-top') $vert = 'vertical';
    
    $content = '
       <div class="imgslider row bg-' . ${imgslider_color_bg} . ' element ' . ${imgslider_top} . ' ' . ${imgslider_bottom} . ' ' . $vert . '">
            <div class="slider">
                <ul>';
    
    $image_ids = explode(',', ${imgslider_images});
    $image_no = 1;
    foreach( $image_ids as $image_id ){
    	$images = wp_get_attachment_image_src( $image_id, 'full' );
    	$url = wp_make_link_relative($images[0]);
    	$url = substr($url, 1);
    	$image = wp_get_image_editor( $url );
    	
        if ( ! is_wp_error( $image ) ) {
            $image->resize( NULL, '500', true );
        	$saved = $image->save();
        }
        $img_desc = get_post( $image_id );
        $img_desc = $img_desc->post_content;
    	$content .= '<li><a class="popup" href="' . $images[0] . '" title="'. $img_desc .'"><div class="description"><p>'. $img_desc .'</p></div><img src="/'. $saved['path'] .'" alt=""/><span class="closer"></span></a></li>';
    	$image_no++;
    }
   
    $content .= '</ul>
                <input class="ranger" type="range" min="0" max="100" step="1" value="0">
            </div>
        </div>';
   
   return $content;
}

add_action( 'vc_before_init', 'imgslider_params' );
function imgslider_params() {
   vc_map( array(
      "name" => "Фотогалерея",
      "base" => "imgslider",
      "class" => "",
      "params" => array(
         array(
            "type" => "attach_images",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Изображения",
            "param_name" => "imgslider_images"
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Цвет фона",
            "param_name" => "imgslider_color_bg",
            "value" => array( "Белый" => "white", "Серый" => "grey" ),
            "std" => "white",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ сверху",
            "param_name" => "imgslider_top",
            "value" => array( "Большой с линией" => "pads-big-top", "Маленький" => "pads-small-top" ),
            "std" => "pads-big-top",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ снизу",
            "param_name" => "imgslider_bottom",
            "value" => array( "Большой" => "pads-big-bottom", "Маленький" => "pads-small-bottom" ),
            "std" => "pads-big-bottom",
            "admin_label" => true
         )
      )
   ) );
}

////////////////////////////////////////////////////////////
//                     COMMENTS 
////////////////////////////////////////////////////////////
add_shortcode( 'your_gallery', 'comments_function' );
function comments_function( $atts, $content = null ) {
    extract( shortcode_atts( array(
      'comments_color_bg' => 'white', 'comments_top' => 'pads-big-top', 'comments_bottom' => 'pads-big-bottom'
   ), $atts ) );
   
    if (${comments_top} == 'pads-big-top') $vert = 'vertical';
   
    $contents = '<div class="comments row bg-' . ${comments_color_bg} . ' element ' . ${comments_top} . ' ' . ${comments_bottom} . ' ' . $vert . '">
                    <div class="column col-sm-12 left-padding-m right-padding-m">
                        <div class="content-inner basic-padding-sides">
                            <h2 class="block-title filler-animation">Отзывы</h2>
    
                            <div id="camps-quote">
                                <div id="testimonials">
                                    <div id="pager">
                                        <a class="prev"></a>
                                        <span class="curr"></span>
                                        <a class="next"></a>
                                    </div>';
    
    $contents .= do_shortcode($content);
                        
    $contents .= '              </div>    
                            </div>
                        </div>
                    </div>
                </div>';
   
   return $contents;
}

add_shortcode( 'single_img', 'comment_function' );
function comment_function( $atts ) {
    extract( shortcode_atts( array(
      'comment_image' => '', 'comment_name' => '', 'comment_job' => '', 'comment_company' => '', 'comment_content' => ''
    ), $atts ) );
    
    $content = '<div class="slide" style="display: none">';
                        
    $testi_img = '
                    <div class="img-holder">
                        <img src="' . wp_get_attachment_url(${comment_image}) . '" alt="">
                    </div>';
    
    $testi_text = ' <div class="basic-text">
                        <p style="white-space: pre-line">';
    $testi_text .= rawurldecode( base64_decode( strip_tags( ${comment_content} ) ) );
    $testi_text .= '    </p>
                        <div class="person">
                            <p class="testi_name">' . ${comment_name} . '</p>
                            <p class="testi_job">' . ${comment_job} . '</p>
                            <p class="testi_job">' . ${comment_company} . '</p>
                        </div>
                    </div>';
                    
    $content .= $testi_img . $testi_text . '</div>';
        
    return $content;
}

add_action( 'vc_before_init', 'comments_params' );
function comments_params() {
    vc_map( array(
        "name" => "Отзывы",
        "base" => "your_gallery",
        "as_parent" => array('only' => 'single_img'),
        "content_element" => true,
        "show_settings_on_create" => false,
        "is_container" => true,
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "hide_params",
                "heading" => "Цвет фона",
                "param_name" => "comments_color_bg",
                "value" => array( "Белый" => "white", "Серый" => "grey" ),
                "std" => "white",
                "admin_label" => true
             ),
             array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "hide_params",
                "heading" => "Вертикальный отступ сверху",
                "param_name" => "comments_top",
                "value" => array( "Большой с линией" => "pads-big-top", "Маленький" => "pads-small-top" ),
                "std" => "pads-big-top",
                "admin_label" => true
             ),
             array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "hide_params",
                "heading" => "Вертикальный отступ снизу",
                "param_name" => "comments_bottom",
                "value" => array( "Большой" => "pads-big-bottom", "Маленький" => "pads-small-bottom" ),
                "std" => "pads-big-bottom",
                "admin_label" => true
             )
        ),
        "js_view" => 'VcColumnView'
    ) );
    
    vc_map( array(
        "name" => "Отзыв",
        "base" => "single_img",
        "content_element" => true,
        "as_child" => array('only' => 'your_gallery'),
        "params" => array(
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "hide_params",
                "heading" => "Фотография",
                "param_name" => "comment_image"
             ),
             array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => "Имя и фамилия",
                "param_name" => "comment_name"
             ),
             array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => "Должность",
                "param_name" => "comment_job"
             ),
             array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => "Компания",
                "param_name" => "comment_company"
             ),
             array(
                "type" => "textarea_raw_html",
                "holder" => "div",
                "class" => "hide_params",
                "heading" => "Отзыв",
                "param_name" => "comment_content"
             )
        )
    ) );
    
    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
        class WPBakeryShortCode_Your_Gallery extends WPBakeryShortCodesContainer {
        }
    }
    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_Single_Img extends WPBakeryShortCode {
        }
    }
}

////////////////////////////////////////////////////////////
//                       CLIENTS SLIDER
////////////////////////////////////////////////////////////
add_shortcode( 'clients', 'clients_function' );
function clients_function( $atts ) {
    extract( shortcode_atts( array(
      'clients_images' => '', 'clients_text' => '', 'clients_top' => 'pads-big-top', 'clients_bottom' => 'pads-big-bottom'
   ), $atts ) );

    if (${clients_top} == 'pads-big-top') $vert = 'vertical';

    $content = '
        <div class="clients row bg-white element pads-big-bottom ' . ${clients_top} . ' ' . $vert . '">
            <div class="column col-sm-6 left-padding-m">
                <div class="content-inner basic-padding-sides">
                    <h2 class="block-title filler-animation">Клиенты</h2>
                    <div class="basic-text shift-up">
                        <p style="white-space: pre-line">';
                        
    $content .= rawurldecode( base64_decode( strip_tags( ${clients_text} ) ) );
    $content .= '      </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row element bg-white ' . ${clients_bottom} . '">
            <div class="column col-sm-12">
                <div class="marquee">
                    <div>';
                
    $image_ids = explode(',', ${clients_images});
    $amount = count( $image_ids );
    $amount = ceil( $amount / 2 );
    $counter = 1;
    $newrow = true;
    foreach( $image_ids as $image_id ) {
    	$images = wp_get_attachment_image_src( $image_id, 'full' );
    	/*$url = wp_make_link_relative($images[0]);
    	$url = substr($url, 1);
    	$image = wp_get_image_editor( $url );
    	
        if ( ! is_wp_error( $image ) ) {
            $image->resize( NULL , '140', true );
        	$saved = $image->save();
        }*/
        if ($counter > 5 && $counter > $amount && $newrow) {
            $content .= '</div><div>';
            $newrow = false;
        }
    	$content .= '<p><img src="' . $images[0] . /*/'. $saved['path'] .*/'" alt=""/></p>';
    	$counter++;
    }
   
    $content .= '   </div>    
                </div>
            </div>
        </div>';
   
   return $content;
}

add_action( 'vc_before_init', 'clients_params' );
function clients_params() {
   vc_map( array(
      "name" => "Клиенты",
      "base" => "clients",
      "class" => "",
      "params" => array(
         array(
            "type" => "attach_images",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Изображения",
            "param_name" => "clients_images"
         ),
         array(
            "type" => "textarea_raw_html",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Описание",
            "param_name" => "clients_text"
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ сверху",
            "param_name" => "clients_top",
            "value" => array( "Большой с линией" => "pads-big-top", "Маленький" => "pads-small-top" ),
            "std" => "pads-big-top",
            "admin_label" => true
         ),
         array(
            "type" => "dropdown",
            "holder" => "div",
            "class" => "hide_params",
            "heading" => "Вертикальный отступ снизу",
            "param_name" => "clients_bottom",
            "value" => array( "Большой" => "pads-big-bottom", "Маленький" => "pads-small-bottom" ),
            "std" => "pads-big-bottom",
            "admin_label" => true
         )
      )
   ) );
}