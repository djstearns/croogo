// File models/thing.js
					exports.definition = {
						
					  config: {
						
						  columns: {
							  "id":"INTEGER PRIMARY KEY","age":"integer","adult_id":"integer","mom":"integer","name":"string","attachment_id":"integer","birthday":"datetime","blonde":"integer"
							 
						  },
						  adapter: {
							  type: "sql",
							  collection_name: "kids",
							  idAttribute: "id"
						  }
						  
						 
					  },        
					  extendModel: function(Model) {        
						  _.extend(Model.prototype, {
							  // extended functions and properties go here
						  });
					 
						  return Model;
					  },
					 
					   extendCollection: function(Collection) {        
						  _.extend(Collection.prototype, {
							  // extended functions and properties go here
						  });
					 
						  return Collection;
					  }
					};