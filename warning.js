function showPopup() {
    if (window.innerWidth < 1024) {
      let popup = document.createElement("div");
      popup.innerText = "A larger device is recommended for an optimal viewing experience.";
      
      popup.style.position = "fixed";
      popup.style.top = "20px";
      popup.style.left = "50%";
      popup.style.transform = "translateX(-50%)";
      popup.style.background = "#48383A";
      popup.style.color = "#FEFEFA";
      popup.style.padding = "10px 20px";
      popup.style.borderRadius = "5px";
      popup.style.zIndex = "1000";
      popup.style.display = "flex";
      popup.style.alignItems = "center";
      popup.style.gap = "10px";
  
      let closeButton = document.createElement("button");
      closeButton.innerText = "✖";
      closeButton.style.background = "transparent";
      closeButton.style.border = "none";
      closeButton.style.color = "#FEFEFA";
      closeButton.style.fontSize = "16px";
      closeButton.style.cursor = "pointer";
  
      closeButton.addEventListener("click", () => {
        popup.remove();
      });
  
      popup.appendChild(closeButton);
      document.body.appendChild(popup);
    }
  }
  
  window.addEventListener("load", showPopup);
  window.addEventListener("resize", showPopup);
  