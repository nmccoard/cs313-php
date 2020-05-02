/*******************************
 * By: Nate McCoard
 * For: CSE 341 - Assignment 02 
 *******************************/

// this bit of JQuery was influenced by w3schools.com
$(document).ready(function(){
    $('#aboveNav').mouseenter(function(){
      $('#logo').animate({right: '300px'});
      $('#logo').animate({left: '300px'});
      $('#logo').animate({left: '0px'});
    });
});