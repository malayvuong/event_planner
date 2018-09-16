<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
//  Get models
use app\models\Users;
use app\models\Congviec;


$this->title = 'Các sự kiện';
$this->params['breadcrumbs'][] = $this->title;
if(isset($sukien['sk_id'])){
$this->params['breadcrumbs'][] = $sukien['sk_name'];
?>
<div class="sukien-index">

    <h1>
        <?= Html::encode($sukien['sk_name']) ?>
        <span><small>tại <strong><?= Html::encode($sukien['sk_khuvuc']) ?></strong></small></span>
    </h1>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Địa điểm</td>
                        <td><?= Html::encode($sukien['sk_address']) ?></td>
                    </tr>
                    <tr>
                        <td>Ngày tổ chức</td>
                        <td><?= Html::encode($sukien['sk_time']) ?></td>
                    </tr>
                    <tr>
                        <td>Thời gian bắt đầu</td>
                        <td><?= Html::encode($sukien['sk_begin']) ?></td>
                    </tr>
                    <tr>
                        <td>Thời gian kết thúc</td>
                        <td><?= Html::encode($sukien['sk_end']) ?></td>
                    </tr>
                    <tr>
                        <td>Ghi chú</td>
                        <td><?= Html::encode($sukien['sk_note']) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 col-xs-12">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Lượt view</td>
                        <td><?= Html::encode($sukien['sk_view']) ?></td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>
                            <?php
                            switch($sukien['sk_status'])
                            {
                                case 2: echo '<button class="btn btn-success">Đã hoàn tất</button>'; break;
                                default: echo'<button class="btn btn-warning">Chưa hoàn tất</button>'; break;
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 col-xs-12">
            <h2>Bảng phân công công việc</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên nhân viên</th>
                        <th>Công việc phân công</th>
                        <th>Chi tiết</th>
                        <th>Thời gian</th>
                        <th>Tiến độ</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    if(isset($linked) && count($linked) > 0)
    {
        foreach($linked as $key => $item)
        {
            $user = Users::find()->where(['id' => $item['user']])->one();
            echo '
                    <tr>
                        <td',($item['status'] > 0 ? ' class="text-success"' : ''),'>',($key+1),'</td>
                        <td',($item['status'] > 0 ? ' class="text-success"' : ''),'>',$user->name,' (',$user->phone,')</td>
                        <td',($item['status'] > 0 ? ' class="text-success"' : ''),'>',Congviec::find()->where(['cv_id' => $item['cv_id']])->one()->cv_name,'</td>
                        <td',($item['status'] > 0 ? ' class="text-success"' : ''),'>',$item['klcv'],'</td>
                        <td',($item['status'] > 0 ? ' class="text-success"' : ''),'>',$item['begin'],' - ',$item['end'],'</td>
                        <td>';
            switch($item['status'])
            {
                case 1: echo '<span class="text-success">Đã hoàn tất</span>'; break;
                default: echo '<span class="text-danger">Chưa hoàn tất</span>'; break;
            }
            if(Yii::$app->user->isGuest) {
            }else{
                if($item['status'] == 0 && Yii::$app->user->id == 100){
                    echo '
                            <a class="text-primary btn btn-sm" data-toggle="tooltip" title="Chỉnh sửa" href="',URL::base(true),'/linked/update?id=',$item['lid'],'"><span class="glyphicon glyphicon-edit"></span></a>
                            <a class="text-success btn btn-sm" data-toggle="tooltip" title="Click để hoàn tất việc này" href="',URL::base(true),'/linked/done?id=',$item['lid'],'&return=',$sukien['sk_id'],'"><span class="glyphicon glyphicon-check"></span></a>';
                }
            }
            echo '
                        </td>
                    </tr>';
        }
    }
    ?>
                </tbody>
            </table>
        </div>
    </div>


<?php 
}else{
    echo '<div class="alert alert-danger">Sự kiện này không tồn tại!</div>';
}
?>