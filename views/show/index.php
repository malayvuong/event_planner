<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = 'Các sự kiện';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sukien-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php
// var_dump($sukiens);
if(count($sukiens) > 0)
{
    echo '
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Sự kiện</th>
                <th>Khu vực</th>
                <th>Thời gian</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>';
    foreach($sukiens as $key => $data)
    {
        echo '
            <tr>
                <td>',($key+1),'</td>
                <td><a href="',URL::base(true).'/show/sukien?id='.$data['sk_id'],'">',$data['sk_name'],' (chi tiết)</a></td>
                <td>',$data['sk_khuvuc'],'</td>
                <td>
                    ',$data['sk_time'],'
                    <span class="center-block">
                        Bắt đầu: <strong>',$data['sk_begin'],'</strong><br>
                        Kết thúc: <strong>',$data['sk_end'],'</strong>
                    </span>
                </td>
                <td>';
        switch($data['sk_status'])
        {
            case 1: echo '<span class="text-primary">Đang diễn ra</span>'; break;
            case 2: echo '<span class="text-success">Đã hoàn tất</span>'; break;
            default: echo '<span class="text-danger">Sắp đến</span>'; break;
        }
        echo '
                </td>
            </tr>';
    }
    echo '
        </tbody>
    </table>';
}
else{
    echo '<div class="alert alert-danger">Không có sự kiện nào được thêm.</div>';
}
?>
</div>
