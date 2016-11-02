<?php

/* /app/View/Helper/LinkHelper.php (using other helpers) */
App::uses('AppHelper', 'View/Helper');

class SltHelper extends AppHelper {
    
    
    public function get_day_name($timestamp) {

        $date = date('d/m/Y', $timestamp);
    
        if($date == date('d/m/Y')) {
          $date = 'Today';
        } 
        else if($date == date('d/m/Y',time() - (24 * 60 * 60))) {
          $date = 'Yesterday';
        }
        return $date;
    }
    
    public function get_header_menu(){
        App::import("Model", "Page");
        $Page_model = new Page();
        $pages = $Page_model->find('all', array('conditions'=> array('Page.menu_position'=>1, 'Page.status'=>1))); 
        return $pages;
    }
    public function get_footer_menu(){
        App::import("Model", "Page");
        $Page_model = new Page();
        $pages = $Page_model->find('all', array('conditions'=> array('Page.menu_position'=>2, 'Page.status'=>1))); 
        return $pages;
    }
    
    public static function printTruncated($str, $len, $end = '&hellip;'){
            //find all tags
            $tagPattern = '/(<\/?)([\w]*)(\s*[^>]*)>?|&[\w#]+;/i';  //match html tags and entities
            preg_match_all($tagPattern, $str, $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER );
            //WSDDebug::dump($matches); exit; 
            $i =0;
            //loop through each found tag that is within the $len, add those characters to the len,
            //also track open and closed tags
            // $matches[$i][0] = the whole tag string  --the only applicable field for html enitities  
            // IF its not matching an &htmlentity; the following apply
            // $matches[$i][1] = the start of the tag either '<' or '</'  
            // $matches[$i][2] = the tag name
            // $matches[$i][3] = the end of the tag
            //$matces[$i][$j][0] = the string
            //$matces[$i][$j][1] = the str offest

            while(!empty($matches[$i][0][1]) && $matches[$i][0][1] < $len && !empty($matches[$i])){

                $len = $len + strlen($matches[$i][0][0]);
                if(substr($matches[$i][0][0],0,1) == '&' )
                    $len = $len-1;


                //if $matches[$i][2] is undefined then its an html entity, want to ignore those for tag counting
                //ignore empty/singleton tags for tag counting
                if(!empty($matches[$i][2][0]) && !in_array($matches[$i][2][0],array('br','img','hr', 'input', 'param', 'link'))){
                    //double check 
                    if(substr($matches[$i][3][0],-1) !='/' && substr($matches[$i][1][0],-1) !='/')
                        $openTags[] = $matches[$i][2][0];
                    elseif(end($openTags) == $matches[$i][2][0]){
                        array_pop($openTags);
                    }else{
                        $warnings[] = "html has some tags mismatched in it:  $str";
                    }
                }


                $i++;

            }

            $closeTags = '';

            if (!empty($openTags)){
                $openTags = array_reverse($openTags);
                foreach ($openTags as $t){
                    $closeTagString .="</".$t . ">"; 
                }
            }

            if(strlen($str)>$len){
                // Finds the last space from the string new length
                $lastWord = strpos($str, ' ', $len);
                if ($lastWord) {
                    //truncate with new len last word
                    $str = substr($str, 0, $lastWord);
                    //finds last character
                    $last_character = (substr($str, -1, 1));
                    //add the end text
                    $truncated_html = ($last_character == '.' ? $str : ($last_character == ',' ? substr($str, 0, -1) : $str) . $end);
                }
                //restore any open tags
                $truncated_html .= $closeTagString;


            }else
            $truncated_html = $str;


            return $truncated_html; 
        }
        function get_file_extension($file_name) {
           return @end(explode('.',$file_name));
        }
        public function generate_form_field($arr,$model_name='',$value=[]){

            App::uses('FormHelper', 'View/Helper');
            $formHelper = new FormHelper(new View());
            $field = '';
            if($arr['field_type']=='text' || $arr['field_type']=='email' || $arr['field_type']=='number' || $arr['field_type']=='password'){
                $field = '<div class="form-group">
                            <label for="'.$arr['field_name'].'">'.$arr['field_display_name'].'<font color="red">'.(($arr['is_required']=='required')?'*':'').'</font></label>
                            '.$formHelper->input($model_name.$arr['field_name'], array('type' => $arr['field_type'],'class'=>$arr['field_class'],'placeholder'=>'Enter '.$arr['field_display_name'],'value'=>!empty($value[$arr['field_name']])?$value[$arr['field_name']]:'','required'=>$arr['is_required'],'label'=>false)).'
                          </div>';
            }
            elseif($arr['field_type']=='select'){
                $field = '<div class="form-group">
                            <label for="'.$arr['field_name'].'">'.$arr['field_display_name'].'<font color="red">'.(($arr['is_required']=='required')?'*':'').'</font></label>
                            '.$formHelper->input($model_name.$arr['field_name'], array('type' => 'select', 'options' => json_decode($arr['field_values'],true), 'class'=>'form-control', 'label'=>false,'default'=>!empty($value[$arr['field_name']])?$value[$arr['field_name']]:'','required'=>$arr['is_required'], 'empty' => 'Select '.$arr['field_display_name'])).'
                          </div>';
            }						elseif($arr['field_type']=='datepicker'){                $field = '<div class="form-group">                            <label for="'.$arr['field_name'].'">'.$arr['field_display_name'].'<font color="red">'.(($arr['is_required']=='required')?'*':'').'</font></label>                            '.$formHelper->input($model_name.$arr['field_name'], array('type' => 'text','class'=>array($arr['field_class'],'datepicker') ,'placeholder'=>'Enter '.$arr['field_display_name'],'value'=>!empty($value[$arr['field_name']])?$value[$arr['field_name']]:'','required'=>$arr['is_required'],'label'=>false)).'                          </div>';            }						elseif($arr['field_type']=='multiselect'){                $field = '<div class="form-group">                            <label for="'.$arr['field_name'].'">'.$arr['field_display_name'].'<font color="red">'.(($arr['is_required']=='required')?'*':'').'</font></label>                            '.$formHelper->input($model_name.$arr['field_name'], array('multiple' => true,'type' => 'select', 'options' => json_decode($arr['field_values'],true), 'class'=>'form-control', 'label'=>false,'default'=>!empty($value[$arr['field_name']])?$value[$arr['field_name']]:'','required'=>$arr['is_required'], 'empty' => 'Select '.$arr['field_display_name'])).'                          </div>';            }
            
            elseif($arr['field_type']=='textarea'){
                $field = '<div class="form-group">
                            <label for="'.$arr['field_name'].'">'.$arr['field_display_name'].'<font color="red">'.(($arr['is_required']=='required')?'*':'').'</font></label>
                            '.$formHelper->input($model_name.$arr['field_name'], array('type' => 'textarea','class'=>'form-control', 'label'=>false,'required'=>$arr['is_required'])).'
                          </div>';
            }
            
            elseif($arr['field_type']=='file'){
                $files = '';
                if(!empty($value[$arr['field_name']])){
                    $ext = $this->get_file_extension($value[$arr['field_name']]);
                    if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='gif'){
                        $files = '<img src="'.$this->webroot.'upload/employee/'.$value[$arr['field_name']].'" width="100" />';
                    }else{
						if(is_array($value[$arr['field_name']]))
						{
							$files = "";
						}
						else
						{
							$files = '<a href="'.$this->webroot.'upload/employee/'.$value[$arr['field_name']].'">'.$value[$arr['field_name']].'</a>';
						}                        
                    }
                }
                $field = '<div class="form-group">
                            <label for="'.$arr['field_name'].'">'.$arr['field_display_name'].'<font color="red">'.(($arr['is_required']=='required')?'*':'').'</font></label>'
                            .$files.'<br>'.$formHelper->file($model_name.$arr['field_name']).'
                          </div>';
            }
            
            return $field;
        }
		
		public function generate_form_field_view($arr,$model_name='',$value=[]){

            App::uses('FormHelper', 'View/Helper');
            $formHelper = new FormHelper(new View());
            $field = '';
            if($arr['field_type']=='text' || $arr['field_type']=='email' || $arr['field_type']=='number' || $arr['field_type']=='password'){
				$data= !empty($value[$arr['field_name']])?$value[$arr['field_name']]:'';
                $field = '<div class="form-group">
                            <label for="'.$arr['field_name'].'">'.$arr['field_display_name'].'<font color="red">'.(($arr['is_required']=='required')?'*':'').'</font></label>
                            '.$data.'
                          </div>';
            }
            elseif($arr['field_type']=='select'){
                $data= !empty($value[$arr['field_name']])?$value[$arr['field_name']]:'';
                $field = '<div class="form-group">
                            <label for="'.$arr['field_name'].'">'.$arr['field_display_name'].'<font color="red">'.(($arr['is_required']=='required')?'*':'').'</font></label>
                            '.$data.'
                          </div>';
            }						
			elseif($arr['field_type']=='datepicker')
			{                
					$data= !empty($value[$arr['field_name']])?$value[$arr['field_name']]:'';
                $field = '<div class="form-group">
                            <label for="'.$arr['field_name'].'">'.$arr['field_display_name'].'<font color="red">'.(($arr['is_required']=='required')?'*':'').'</font></label>
                            '.$data.'
                          </div>';
			}
            
            elseif($arr['field_type']=='textarea'){
                $data= !empty($value[$arr['field_name']])?$value[$arr['field_name']]:'';
                $field = '<div class="form-group">
                            <label for="'.$arr['field_name'].'">'.$arr['field_display_name'].'<font color="red">'.(($arr['is_required']=='required')?'*':'').'</font></label>
                            '.$data.'
                          </div>';
            }
            
            elseif($arr['field_type']=='file'){
                $files = '';
                
                if(!empty($value[$arr['field_name']])){
                    $filename =$value[$arr['field_name']];
                    if(!is_array($filename)){
                        $ext = $this->get_file_extension($filename);
                        if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='gif'){
                            $files = '<img src="'.$this->webroot.'upload/employee/'.$filename.'" width="100" />';
                        }else{
                            $files = '<a href="'.$this->webroot.'upload/employee/'.$filename.'">'.$filename.'</a>';
                        }
                    }
                    
                }
                /*
                $field = '<div class="form-group">
                            <label for="'.$arr['field_name'].'">'.$arr['field_display_name'].'<font color="red">'.(($arr['is_required']=='required')?'*':'').'</font></label>'
                            .$files.'<br>
                          </div>';
                */
                $field = '<div class="form-group">'
                            .$files.'
                          </div>';
            }
            
            return $field;
        }
    
    
}


?>