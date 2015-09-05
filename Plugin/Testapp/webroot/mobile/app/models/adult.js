// File models/thing.js
					exports.definition = {
						
					  config: {
						
						  columns: {
							  "id":"INTEGER PRIMARY KEY","name":"string","homeloc_lat":"float","homeloc_lng":"float","photo":"integer"
							 
						  },
						  adapter: {
							  type: "sql",
							  collection_name: "adults",
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