/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package CashRegister;


/**
 *
 * @author Teilnehmer
 */

    public class Testor {

        public static void main(String[] args) {
            CashRegister register = new CashRegister();
            register.recordPurchase(29.50);
            register.recordPurchase(580.41);
            register.recordPurchase(219.89);
            register.recordPurchase(9.25);
            register.recordPurchase(9.25);
            register.recordPurchase(111.25);
            register.recordPurchase(0.25);
            register.recordPurchase(2400.25);
           
            
            register.receivePayment(5000);
            double change = register.giveChange();
            System.out.println(change);
            System.out.println("Expected: 11.25");
        }
    }


