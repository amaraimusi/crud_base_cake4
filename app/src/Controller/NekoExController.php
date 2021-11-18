<?php
namespace App\Controller;

use App\Controller\AppController;

use App\Controller\NekosController;
use App\vendor\CrudBase\CrudBaseController;

class NekoExController extends NekosController{
    
    
    
    
    public function index(){
        //debug('xxx');//■■■□□□■■■□□□)
        $this->paginate = [
            'contain' => ['EnSps'],
        ];
        $nekos = $this->paginate($this->NekoEx);
        
        $this->set(compact('nekos'));
        
    }
    
    
    
    /**
     * CrudBase用の初期化処理
     *
     * @note
     * フィールド関連の定義をする。
     *
     */
    private function init(){
        
        /// 検索条件情報の定義
        $kensakuJoken=[
            
            ['name'=>'kj_main', 'def'=>null],
            // CBBXS-2000
            ['name'=>'kj_id', 'def'=>null],
            ['name'=>'kj_neko_val1', 'def'=>null, 'field'=>'neko_val'],
            ['name'=>'kj_neko_val2', 'def'=>null, 'field'=>'neko_val'],
            ['name'=>'kj_neko_name', 'def'=>null],
            ['name'=>'kj_neko_date_ym', 'def'=>null],
            ['name'=>'kj_neko_date1', 'def'=>null, 'field'=>'neko_date'],
            ['name'=>'kj_neko_date2', 'def'=>null, 'field'=>'neko_date'],
            ['name'=>'kj_neko_group', 'def'=>null],
            ['name'=>'kj_en_sp_id', 'def'=>null],
            ['name'=>'kj_neko_dt', 'def'=>null],
            ['name'=>'kj_neko_flg', 'def'=>-1],
            ['name'=>'kj_img_fn', 'def'=>null],
            ['name'=>'kj_note', 'def'=>null],
            ['name'=>'kj_sort_no', 'def'=>null],
            ['name'=>'kj_delete_flg', 'def'=>0],
            ['name'=>'kj_update_user', 'def'=>null],
            ['name'=>'kj_ip_addr', 'def'=>null],
            ['name'=>'kj_created', 'def'=>null],
            ['name'=>'kj_modified', 'def'=>null],
            // CBBXE
            
            ['name'=>'row_limit', 'def'=>50],
            
        ];
        
        
        ///フィールドデータ
        $fieldData = ['def'=>[
            
            // CBBXS-2002
            'id'=>[
                'name'=>'ID',//HTMLテーブルの列名
                'row_order'=>'Neko.id',//SQLでの並び替えコード
                'clm_show'=>1,//デフォルト列表示 0:非表示 1:表示
            ],
            'neko_val'=>[
                'name'=>'ネコ数値',
                'row_order'=>'Neko.neko_val',
                'clm_show'=>0,
            ],
            'neko_name'=>[
                'name'=>'ネコ名前',
                'row_order'=>'Neko.neko_name',
                'clm_show'=>1,
            ],
            'neko_group'=>[
                'name'=>'ネコ種別',
                'row_order'=>'Neko.neko_group',
                'clm_show'=>1,
            ],
            'en_sp_id'=>[
                'name'=>'絶滅危惧種',
                'row_order'=>'Neko.en_sp_id',
                'clm_show'=>1,
                'outer_tbl_name'=>'en_sps',
                'outer_tbl_name_c'=>'EnSp',
                'outer_field'=>'wamei',
                'outer_alias'=>'en_sp_name'
            ],
            'neko_date'=>[
                'name'=>'ネコ日',
                'row_order'=>'Neko.neko_date',
                'clm_show'=>1,
            ],
            'neko_dt'=>[
                'name'=>'ネコ日時',
                'row_order'=>'Neko.neko_dt',
                'clm_show'=>1,
            ],
            'neko_flg'=>[
                'name'=>'ネコフラグ',
                'row_order'=>'Neko.neko_flg',
                'clm_show'=>1,
            ],
            'img_fn'=>[
                'name'=>'画像ファイル名',
                'row_order'=>'Neko.img_fn',
                'clm_show'=>1,
            ],
            'note'=>[
                'name'=>'備考',
                'row_order'=>'Neko.note',
                'clm_show'=>0,
            ],
            'sort_no'=>[
                'name'=>'順番',
                'row_order'=>'Neko.sort_no',
                'clm_show'=>0,
            ],
            'delete_flg'=>[
                'name'=>'有効/無効',
                'row_order'=>'Neko.delete_flg',
                'clm_show'=>1,
            ],
            'update_user'=>[
                'name'=>'更新者',
                'row_order'=>'Neko.update_user',
                'clm_show'=>0,
            ],
            'ip_addr'=>[
                'name'=>'更新IPアドレス',
                'row_order'=>'Neko.ip_addr',
                'clm_show'=>0,
            ],
            'created'=>[
                'name'=>'生成日時',
                'row_order'=>'Neko.created',
                'clm_show'=>0,
            ],
            'modified'=>[
                'name'=>'更新日時',
                'row_order'=>'Neko.modified',
                'clm_show'=>1,
            ],
            // CBBXE
        ]];
        
        // 列並び順をセットする
        $clm_sort_no = 0;
        foreach ($fieldData['def'] as &$fEnt){
            $fEnt['clm_sort_no'] = $clm_sort_no;
            $clm_sort_no ++;
        }
        unset($fEnt);
        
        require_once CRUD_BASE_PATH . 'CrudBaseController.php';
        
        $model = $this->Neko; // モデルクラス
        
        // デフォルトページ情報
        $defPages = [
            'sort_field'=>'Neko.sort_no',
            'sort_desc'=>0,
        ];
        
        $crudBaseData = [
            'fw_type' => 'cake',
            'model_name_c' => 'Neko',
            'tbl_name' => 'nekos', // テーブル名をセット
            'kensakuJoken' => $kensakuJoken, //検索条件情報
            'fieldData' => $fieldData, //フィールドデータ
            'defPages' => $defPages,
        ];
        
        $crudBaseCon = new CrudBaseController($this, $model, $crudBaseData);
        
        $model->init($crudBaseCon);
        
        $this->md = $model;
        $this->cb = $crudBaseCon;
        
        $crudBaseData = $crudBaseCon->getCrudBaseData();
        
        return $crudBaseData;
        
    }
    
    
}