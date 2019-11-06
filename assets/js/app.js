// HTMLが読み込まれたら、{}の中が実行される
// $(function(){


$(function(){

  // 追加ボタンaddクリック
  $('#add-button').on('click', function(e){
    // alert('addがクリックされました');

    //  formタグの送信を無効化される（二重投稿を防ぐ）
    e.preventDefault();

    // 入力されたタスク名を取得
    let taskName = $('#input-task').val();
    // alert(taskName);

    // ajax開始
    $.ajax({
      // キー（決まった文言）：値
      url:'create.php',
      type: 'POST',
      dataType: 'json',
      data: {
      // 送信する値を書くブロック(index.phpの name がtaskだからtask)
        task: taskName
      }

    }).done((data) =>{
       console.log(data);

      //  $('tbody').prepend(`<p>${data['name']}</p>`);
       $('tbody').prepend(
            `<tr>` +
              `<td>${data['name']}</td>` +
              `<td>${data['due_date']}</td>` +
              `<td>NOT YET</td>` +
              `<td>` +
                  `<a class="text-success" href="edit.php?id=${data['id']}">EDIT</a>` +
               `</td>` +
              `<td>` +
              `<a data-id="${data['id']}" class="text-danger delete-button" href="delete.php?id=${data['id']}">DELETE</a>` +
              `</td>` +
              `</tr>`

       );



    }).fail((error) => {
       console.log(error);
    })

  });

    // alert('addがクリックされました2');
//   $('.text-light').on('click',function(){
//     alert(1);
//   });

// 削除のボタンがクリックされた時の処理
//  $('.delete-button').on('click', function(e){
  $(document).on('click','.delete-button',function(e){

  // 二重送信無効化
  e.preventDefault();
  // alert('DELETE');

  // 削除対象のIDを取得
  // $(this)今イベントが実行されている本体
  // 今回の場合は、クリックされたaタグ本体
  let selectedId = $(this).data('id');
  alert(selectedId);

  // ajax開始
  $.ajax({
    url: 'delete.php',
    type: 'GET',
    data :{
       id: selectedId
    },
    dataType: 'json'
   }).done((data) =>{
    console.log(data);
  
  }).fail((error) => {
    console.log(error);

  })

});

});