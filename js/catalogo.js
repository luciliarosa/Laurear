

//temos que alterar tudo aqui, apenas peguei a base.
// transformar planilha "produtos" que está no banco em JSON e colar no js
// após isso apenas js e css para conseguir criar o catalogo na page do php do catalogo.

function createProductImageElement(imageSource) {
    const img = document.createElement('img');
    img.className = 'item__image';
    img.src = imageSource;
    return img;
  }
  
  function createCustomElement(element, className, innerText) {
    const e = document.createElement(element);
    e.className = className;
    e.innerText = innerText;
    return e;
  }
  // função para adicionar produtos no catalago
  function adcItemList(item) {
    const mae = document.querySelector('.items');
    mae.appendChild(item);
  }
  
  function getSkuFromProductItem(item) {
    return item.querySelector('span.item__sku').innerText;
  }