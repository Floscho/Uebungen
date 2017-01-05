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
public class CashRegister {

    //Attribute
    private double purchase;
    private double payment;

    //Konstruktoren
    public CashRegister() {
    }

    //Methoden
    public void recordPurchase(double amount) {
        amount = amount * 100;
        purchase = purchase + amount;
    }

    public void receivePayment(double amount) {
        payment = payment + amount;
        payment = payment * 100;
    }

   
    
    
    public double giveChange() {
        double change = payment - purchase;
        double change1 = change / 100;
        purchase = 0;
        payment = 0;
        return change1;
    }

    

}
