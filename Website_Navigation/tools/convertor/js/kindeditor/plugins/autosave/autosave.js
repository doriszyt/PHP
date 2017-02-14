/*******************************************************************************
* 自行添加的插件
*******************************************************************************/

KindEditor.plugin('autosave', function(K) {
	var self = this;
	
	if (!window.localStorage || typeof self.autoSaveSpace == 'undefined' || !self.autoSaveSpace) {
		return;
	}

	var KEDataSpace =  'KEitor_' + self.autoSaveSpace;

	function elocalStorage(init)	{
		if(init) {
			if(window.localStorage.getItem(KEDataSpace) !== null)	{
				if(self.isEmpty())
				{
					recoverData();
					return;
				}

				self.readonly(true);

				 K('.ke-edit', self.container).append('<div id="KEAutoSaveTipBox" class="KEAutoSaveTipBox"><div class="KEAutoSaveTip">' + self.lang('autosave.recoverComfirm') + '  <a href="javascript: void(0);" class="recoverData">' + self.lang('autosave.recover') + '</a><em>|</em><a href="javascript: void(0);"  class="previewData">' + self.lang('autosave.preview') + '</a><em>|</em><a href="javascript: void(0);"  class="deleteData">' + self.lang('autosave.delete') + '</a></div><div class="KEAutoSaveClose"><a href="javascript: void(0);"  class="close">x</a></div></div>');

				$('a.recoverData', $('#KEAutoSaveTipBox')).click(function(){ recoverData(); return false; });
				$('a.previewData', $('#KEAutoSaveTipBox')).click(function(){ previewData(); return false; });
				$('a.deleteData', $('#KEAutoSaveTipBox')).click(function(){ clearData(true); return false; });
				$('a.close', $('#KEAutoSaveTipBox')).click(function(){ removeTip(); return false; });
			}

			return;
		}
	
		if(!self.isEmpty())
		{
			removeTip();
			saveData();
			/*
			d = new Date();
			var h = d.getHours();
			var m = d.getMinutes();
			h = h < 10 ? '0' + h : h;
			m = m < 10 ? '0' + m : m;
			$('#' + self.autoSave.tip).html(K.tmpl(lang.saveDesc, {hour : h, minute : m}));
			*/
			//$('#' + self.autoSave.tip).html(self.lang('autosave.saveDesc'));
		}
		else
		{
			clearData(false);
		}
	}

	function removeTip()
	{
		$('#KEAutoSaveTipBox').remove();
		self.readonly(false);
	}

	function saveData()	{
		window.localStorage.setItem(KEDataSpace, self.html());
	}

	function recoverData() {
		if(window.localStorage.getItem(KEDataSpace) !== null)	{
			self.html(window.localStorage.getItem(KEDataSpace));
		}
		clearData(true);
	}

	function clearData(closetip){
		window.localStorage.removeItem(KEDataSpace);
		if(closetip) removeTip();
	}

	function previewData() {
		if(window.localStorage.getItem(KEDataSpace) === null)
			return false;

		html = '<div style="padding:10px 20px;">' +
			'<iframe class="ke-textarea" frameborder="0" style="width:708px;height:400px;"></iframe>' +
			'</div>',
		dialog = self.createDialog({
			name : name,
			width : 750,
			title : self.lang('autosave.preview'),
			body : html
		}),
		iframe = K('iframe', dialog.div),
		doc = K.iframeDoc(iframe);
		doc.open();
		doc.write(window.localStorage.getItem(KEDataSpace));
		doc.close();
		K(doc.body).css('background-color', '#FFF');
		iframe[0].contentWindow.focus();
	}

	function init() {
		self.edit.afterChange(function(){elocalStorage(false)});
		elocalStorage(true);
	}

	if (self.isCreated) {
		init();
	} else {
		self.afterCreate(init);
	}

	// 从 kindeditor 中拷贝的内部函数
	function _elementVal(knode, val) {
		if (knode.hasVal()) {
			if (val === undefined) {
				var html = knode.val();
				html = html.replace(/(<(?:p|p\s[^>]*)>) *(<\/p>)/ig, '');
				return html;
			}
			return knode.val(val);
		}
		return knode.html(val);
	}

	// 重写 sync 函数，这个可能是有的小问题的
	self.sync = function() {
		_elementVal(self.srcElement, self.html());
		clearData();
		return self;
	}
});