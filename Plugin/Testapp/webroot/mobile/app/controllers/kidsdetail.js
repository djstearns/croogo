///**************
		/*
		 * 
		 Three variable arrays:
		 Data Transform:
		 Static portion:	id:_model.attributes.id
		 Variable:	 		[fldname]: _model.attributes.[fldname]
		 
		 Save Data:
		 Static Portion:	id: $.name.datid,
		 Variable:			[fldname]: $.[fldname].value,
		 
		 Local Save data:
		 Static portion: NA
		 Variable:		 itemModel.set('[fldname]', $.[fldname].value);
						
		 */
		////*************
		
		var args = arguments[0] || {};
		var parentTab = args.parentTab || '';
		var dataId = (args.dataId === 0 || args.dataId > 0) ? args.dataId : '';
		
		if (dataId !== '') {
			var model = Alloy.Collections[args.model].get(dataId);
			$.thingDetail.set(model.attributes);
			
			$.thingDetail = _.extend({}, $.thingDetail, {
				transform : function() {
					return dataTransformation(this);
				}
			});
		
			function dataTransformation(_model) {
				return {
					//ModelVars
					id : _model.attributes.id,
					age:_model.attributes.age,adult_id:_model.attributes.adult_id,mom:_model.attributes.mom,name:_model.attributes.name,attachment_id:_model.attributes.attachment_id,birthday:_model.attributes.birthday,blonde:_model.attributes.blonde,
					//ModelVars
				};
			}
		}
		
		function savetoremote(){
			var sendit = Ti.Network.createHTTPClient({
					onerror : function(e) {
						Ti.API.debug(e.error);
						savetoremote();
						alert('There was an error during the connection');
					},
					timeout : 1000,
				});
				//TODO: make lowercase
			sendit.open('POST', Alloy.Globals.BASEURL+Alloy.Globals.PLUGIN+args.model+'/mobilesave');
			sendit.send({
				//Model Vars
				id: $.name.datid,
				age:$.age.value,adult_id:$.adult_id.value,mom:$.mom.value,name:$.name.value,attachment_id:$.attachment_id.value,birthday:$.birthday.value,blonde:$.blonde.value,
				//Model Vars
			});
			// Function to be called upon a successful response
			sendit.onload = function() {
				var json = JSON.parse(this.responseText);
				// var json = json.todo;
				// if the database is empty show an alert
				if (json.length == 0) {
					$.table.headerTitle = 'The database row is empty';
					
				}
			};
		}
		
		/*
		IF there is a date field we need to add this code: 
		
		
		$.birthday.addEventListener('click', function(e){
			Ti.UI.backgroundColor = 'white';
			var winpop = Ti.UI.createWindow({
			  exitOnClose: true,
			  layout: 'vertical'
			});
			
			var picker = Ti.UI.createPicker({
			  type:Ti.UI.PICKER_TYPE_DATE,
			  minDate:new Date(2009,0,1),
			  maxDate:new Date(2014,11,31),
			  value:new Date(2014,3,12),
			  top:50
			});
			
			var b = Ti.UI.createButton({
				title:'Close',
				width:100,
				height:30
			});
			b.addEventListener('click',function()
			{
				winpop.close();
			});
			
			winpop.add(picker);
			winpop.add(b);
			winpop.open({modal:true});
			
			picker.addEventListener('change',function(e){
			  //Ti.API.info('User selected date: ' + e.value.toLocaleString());
			  $.birthday.value = e.value.toLocaleString();
			});
		});
		
		
		*/
		
		
			var dialogChange = Titanium.UI.createOptionDialog({
				//title of dialog
				title: 'View or Change Image...',
				//options
				options: ['View','Change', 'Cancel'],
				//index of cancel button
				cancel:2
			});
			
			var dialog = Titanium.UI.createOptionDialog({
				//title of dialog
				title: 'Choose an image source...',
				//options
				options: ['Camera','Photo Gallery', 'Cancel'],
				//index of cancel button
				cancel:2
			});
			
			dialogChange.addEventListener('click', function(e) {
				if(e.index == 0){
					//open a view and show the image
				}else{
					dialog.show();
				}
			});
			 
			
			 
			//add event listener
			dialog.addEventListener('click', function(e) {
				//if first option was selected
				if(e.index == 0){
					//then we are getting image from camera
					Titanium.Media.showCamera({
						//we got something
						success:function(event){
							//getting media
							var image = event.media; 
							 
							//checking if it is photo
							if(event.mediaType == Ti.Media.MEDIA_TYPE_PHOTO){
								//we may create image view with contents from image variable
								//or simply save path to image
								//save for future use
								var f = Ti.Filesystem.getFile(Ti.Filesystem.applicationDataDirectory, 'photo' + $.name.datid + '.png');
								f.write(image);
					
								// update the model and save
								$[e.source.obj].value = f.nativePath;
								//Ti.App.Properties.setString('image', image.nativePath);
							}
						},
						cancel:function(){
							//do somehting if user cancels operation
						},
						error:function(error)
						{
							//error happend, create alert
							var a = Titanium.UI.createAlertDialog({title:'Camera'});
							//set message
							if (error.code == Titanium.Media.NO_CAMERA){
								a.setMessage('Device does not have camera');
							}else{
								a.setMessage('Unexpected error: ' + error.code);
							}
			 
							// show alert
							a.show();
						},
						allowImageEditing:true,
						saveToPhotoGallery:true
					});
				}else if(e.index == 1){
					//obtain an image from the gallery
					Titanium.Media.openPhotoGallery({
						success:function(event){
							//getting media
							var image = event.media; 
							// set image view
							//checking if it is photo
							if(event.mediaType == Ti.Media.MEDIA_TYPE_PHOTO){
								//we may create image view with contents from image variable
								//or simply save path to image
								var f = Ti.Filesystem.getFile(Ti.Filesystem.applicationDataDirectory, 'photo' + $.name.datid + '.png');
								f.write(image);
								//upload photo
								var xhr = Ti.Network.createHTTPClient({
								    onerror: function(e){
								        Ti.API.info('ERROR: ' + e.error);
								        alert('fail');
								    },
								    onload:function(e) {
								        //Ti.API.info('STATUS: ' + this.status + ' READY_STATE: ' + this.readyState);                     
								        //alert('success');
								    },
								   
								    onsendstream:function(e){
								       // Ti.API.info('PROGRESS: ' + e.progress);
								    }
						    	});
							    xhr.open('POST','http://www.derekstearns.com/appcreator/file_manager/attachments/upload'); //a directory on server for test
							    xhr.setRequestHeader('enctype', 'multipart/form-data');
							    xhr.send({file:event.media});
								// update the model and save
								$[e.source.obj].value = f.nativePath;
								//Ti.App.Properties.setString('image', image.nativePath); 
							}   
						},
						cancel:function(){
							//user cancelled the action fron within
							//the photo gallery
						}
					});
				}
				else
				{
					//cancel was tapped
					//user opted not to choose a photo
				}
			});
			
			
			
		$.attachment_id.addEventListener('click', function(e){
										
										dialogChange.show();
									});
		
		
		//Pickers!
		
				
				$.birthday.addEventListener('click', function(e){
					Ti.UI.backgroundColor = 'white';
					var birthdaydatemodal = Ti.UI.createWindow({
					  exitOnClose: true,
					  layout: 'vertical'
					});
					
					var birthdaypicker = Ti.UI.createPicker({
					  type:Ti.UI.PICKER_TYPE_DATE,
					  minDate:new Date(1900,1,1),
					  maxDate:new Date(2015,12,31),
					  value:new Date(2014,3,12),
					  top:50
					});
					
					var birthdayclosebtn = Ti.UI.createButton({
						title:'Close',
						width:100,
						height:30
					});
					birthdayclosebtn.addEventListener('click',function()
					{
						birthdaydatemodal.close();
					});
					
					birthdaydatemodal.add(birthdaypicker);
					birthdaydatemodal.add(bbirthdayclosebtn);
					birthdaydatemodal.open({modal:true});
					
					birthdaypicker.addEventListener('change',function(e){
					  //Ti.API.info('User selected date: ' + e.value.toLocaleString());
					  $.birthday.value = e.value.toLocaleString();
					});
				});
				
				
		
		
		///Buttons!
		
		$.cancelbtn.addEventListener('click', function(){
			//$.kidsdetail.close();
			$.detail.close();
		});
		
		$.savebtn.addEventListener('click', function(){
			var itemModel = model;
			//Model VARS
			//itemModel.set("age", $.age.value);
				itemModel.set("adult_id", $.adult_id.value);
				itemModel.set("mom", $.mom.value);
				itemModel.set("name", $.name.value);
				itemModel.set("attachment_id", $.attachment_id.value);
				itemModel.set("birthday", $.birthday.value);
				itemModel.set("blonde", $.blonde.value);
				
			//End model vars
			//TODO: fix all lowercase
			globalsave(Alloy.Globals.BASEURL+Alloy.Globals.PLUGIN+args.tablename+'/mobilesave', {id: $.name.datid,age:$.age.value,adult_id:$.adult_id.value,mom:$.mom.value,name:$.name.value,attachment_id:$.attachment_id.value,birthday:$.birthday.value,blonde:$.blonde.value,},args.model,{id: $.name.datid,age:$.age.value,adult_id:$.adult_id.value,mom:$.mom.value,name:$.name.value,attachment_id:$.attachment_id.value,birthday:$.birthday.value,blonde:$.blonde.value,});
			//itemModel.save();
			//Alloy.Collections.Thing.fetch();
			//savetoremote();
			//$.kidsdetail.close();
			$.detail.close();
		});
		
		 // Android
		if (OS_ANDROID) {
			$.kidsdetail.addEventListener('open', function() {
				if($.kidsdetail.activity) {
					var activity = $.kidsdetail.activity;
		
					// Action Bar
					if( Ti.Platform.Android.API_LEVEL >= 11 && activity.actionBar) {      
						activity.actionBar.title = L('detail', 'Detail');
						activity.actionBar.displayHomeAsUp = true; 
						activity.actionBar.onHomeIconItemSelected = function() {               
							//$.kidsdetail.close();
							$.detail.close();
							//$.kidsdetail = null;
							$.detail = null;
						};             
					}
				}
			});
			
			// Back Button - not really necessary here - this is the default behavior anyway?
			$.kidsdetail.addEventListener('android:back', function() {              
					//$.kidsdetail.close();
					$.detail.close();
					//$.kidsdetail = null;
					$.detail = null;
			});     
		}