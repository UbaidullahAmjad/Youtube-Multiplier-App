/**
 * autoViewerIframe 1.0 - 2020
 *
 * 
 *
 * @author    https://github.com/jpanqueva
 * @author    https://github.com/archarry86
 * @link    https://github.com/jpanqueva/autoViewerIframe
 */

window.$autoViewerYoutube5 = {
    options:{
      regexs:[
        {
          condition: /http(?:s?):\/\/(?:www\.)?youtu(?:be\.com\/watch\?v=|\.be\/)([\w\-\_]*)(&(amp;)?‌[\w\?‌=]*)?/,
          embed:"https://www.youtube.com/embed/"
        }
      ],
      
    },
  
    bind:(target) => {
      target.addEventListener("change", window.$autoViewerYoutube5.analyze,false); 
      target.addEventListener("paste", window.$autoViewerYoutube5.analyze,false); 
    },
    analyze:(event) => {
      var _target = event.target
      var id_container5 = _target.dataset.containerId6
      
      if(id_container5){
        
         
        for (let index = 0; index < window.$autoViewerYoutube5.options.regexs.length; index++) {
          
          var re = window.$autoViewerYoutube5.options.regexs[index].condition;
  
          var text = ""; 
  
          if(event.clipboardData!= undefined){ // verificamos si es un copy paste
            text  = event.clipboardData.getData('text/plain')
          }else{
            text = event.srcElement.value;
          }
  
          var match = re.exec(text);
  
          if(match!= null && match.length > 0 ){
  
          var url = match[0].toString();
          
          var url6 = window.$autoViewerYoutube5.options.regexs[index].embed + match[1];
          var iframe = '<iframe width="420" height="315" src="'+url6+'"> </iframe>';
          document.getElementById(id_container5).innerHTML = iframe;
  
          }
       }
      }
    }
  };