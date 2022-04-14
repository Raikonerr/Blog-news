<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(request()->routeIs('posts.store')){
            $imageRule = 'image|required'; 
        }elseif(request()->routeIs('posts.update')){
            $imageRule = 'image|sometimes';
        }
        
        return [
            'title' => 'required',
            'Body' => 'required',
            'immage' => $imageRule,
            'category' => 'required'
        ];
        
    }

    protected function prepareForValidation(){
        if($this->immage == null){
            $this->request->remove('image');
        }
    }
}
