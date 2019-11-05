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
                  `<a class="text-danger" href="delete.php?id=${data['id']}">DELETE</a>` +
              `</td>` +
              `</tr>`

       );





    }).fail((error) => {

    })

  });

    // alert('addがクリックされました2');
//   $('.text-light').on('click',function(){
//     alert(1);
//   });

});