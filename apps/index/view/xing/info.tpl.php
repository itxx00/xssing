<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
   <h4 class="modal-title" id="myModalLabel"><?php echo $info['title'] ?></h4>
   <h5 class="modal-title" id="myModalLabel"><?php echo $info['url'] ?></h5>
</div>
<div class="modal-body">
    <textarea readonly="readonly" autofocus="" rows="11" class="col-xs-12" id="TheCookie"><?php echo $info['cookie'] ?></textarea>
</div>
<div class="modal-footer">
   <button class="btn btn-success btn-sm" type="button" id="copy-button" data-clipboard-target="TheCookie" data-clipboard-text="Copy Me!" title="Copy to clipboard">复制到剪贴板</button>
    <script src="/static/copybutton.js"></script>
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">关闭</button>
</div>