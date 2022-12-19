/**
 * autoViewerIframe 1.0 - 2020
 *
 * 
 *
 * @author    https://github.com/jpanqueva
 * @author    https://github.com/archarry86
 * @link    https://github.com/jpanqueva/autoViewerIframe
 */

window.$autoViewerYoutube4 = {
    options:{
      regexs:[
        {
          condition: /http(?:s?):\/\/(?:www\.)?youtu(?:be\.com\/watch\?v=|\.be\/)([\w\-\_]*)(&(amp;)?‌[\w\?‌=]*)?/,
          embed:"https://www.youtube.com/embed/"
        }
      ],
      
    },
  
    bind:(target) => {
      target.addEventListener("change", window.$autoViewerYoutube4.analyze,false); 
      target.addEventListener("paste", window.$autoViewerYoutube4.analyze,false); 
    },
    analyze:(event) => {
      var _target = event.target
      var id_container4 = _target.dataset.containerId5
      
      if(id_container4){
        
         
        for (let index = 0; index < window.$autoViewerYoutube4.options.regexs.length; index++) {
          
          var re = window.$autoViewerYoutube4.options.regexs[index].condition;
  
          var text = ""; 
  
          if(event.clipboardData!= undefined){ // verificamos si es un copy paste
            text  = event.clipboardData.getData('text/plain')
          }else{
            text = event.srcElement.value;
          }
  
          var match = re.exec(text);
  
          if(match!= null && match.length > 0 ){
  
          var url = match[0].toString();
          
          var url5 = window.$autoViewerYoutube4.options.regexs[index].embed + match[1];
          var iframe = '<iframe width="420" height="315" src="'+url5+'"> </iframe>';
          document.getElementById(id_container4).innerHTML = iframe;
  
          }
       }
      }
    }
  };