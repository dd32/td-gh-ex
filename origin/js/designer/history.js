// Lets keep a history stack
window.simpleHistory = {
    stack:[],
    i:0,
    lock : false,

    add:function (input) {
        if (this.i > 0) {
            // We need to get rid of the extra items
            this.stack.splice(0, this.i);
        }

        this.i = 0;
        this.stack.unshift(input); // Add input to the beginning
        // Only keep 50 elements at a time
        if (this.stack.length > 50) this.stack.splice(50, 999);

        this.updateButtonStates();
    },

    setItem: function (input) {
        setPreviewInput(input);
        
        // Set the field values to match
        this.lock = true; // Prevent preview updates
        for(var section in input){
            for(var field in input[section]){
                
                if(typeof input[section][field] === 'string'){
                    var name = 'settings[' + section + '][' + field + ']';
                    this.setFieldValue(name, input[section][field]);
                }
                else{
                    for (var i in input[section][field]) {
                        var name = 'settings[' + section + '][' + field + '][' + i + ']';
                        this.setFieldValue(name, input[section][field][i]);
                    }
                }
            }
        }
        this.lock = false;
    },
    
    setFieldValue: function(name, value){
        jQuery('*[name="' + name.replace(/([\[\]])/g, "\\$1") + '"]').val(value).change();
    },

    undo:function () {
        this.i++;
        if(this.stack[this.i] != undefined) {
            this.setItem(this.stack[this.i]);
        }
        else this.i = this.stack.length - 1;
        
        this.updateButtonStates();
    },

    redo:function () {
        this.i--;
        if (this.i >= 0) this.setItem(this.stack[this.i]);
        else this.i = 0;
        
        this.updateButtonStates();
    },
    
    updateButtonStates: function(){
        if(this.i < this.stack.length) this.undoButton.css('opacity',1);
        else this.undoButton.css('opacity', 0.35);
        
        if(this.i > 0) this.redoButton.css('opacity', 1);
        else this.redoButton.css('opacity', 0.35);
    },
    
    setUndoButton:function (button) {
        button.click(function () {
            window.simpleHistory.undo();
            return false;
        });
        this.undoButton = button;
    },

    setRedoButton:function (button) {
        button.click(function () {
            window.simpleHistory.redo();
            return false;
        });
        this.redoButton = button;
    }
};