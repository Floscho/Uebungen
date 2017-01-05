
import java.awt.BasicStroke;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Ellipse2D;
import javax.swing.JComponent;
import java.awt.Color;
import java.awt.GradientPaint;
import java.awt.geom.CubicCurve2D;
/**
 * A component that draws an alien face.
 */
public class FaceComponent extends JComponent {

    @Override
    public void paintComponent(Graphics g) {
        // Recover Graphics2D
        Graphics2D g2 = (Graphics2D) g;

        // Draw the head
        Ellipse2D.Double head = new Ellipse2D.Double(5, 10, 100, 150);
        GradientPaint btb = new GradientPaint(5, 10, Color.green, 0, 150, new Color(0, 100, 0));
        g2.setPaint(btb);
        g2.fill(new Ellipse2D.Double(5, 10, 100, 150));
        g2.fill(head);
        g2.draw(head);

        // Draw the left eye
        g2.setColor(Color.BLUE);
        Ellipse2D.Double eye = new Ellipse2D.Double(25, 70, 10, 10);
        g2.fill(eye);

        // Draw the right eye
        g2.setColor(Color.BLUE);
        Ellipse2D.Double eye1 = new Ellipse2D.Double(65, 70, 10, 10);
        g2.fill(eye1);

        //Draw nose
        g2.setColor(Color.RED);
        Ellipse2D.Double nose = new Ellipse2D.Double(45, 85, 15, 15);
        g2.fill(nose);

        // Draw the greeting
        g2.setColor(Color.RED);
        g2.drawString("HO!HO!HO!", 35, 175);

        // Draw the mouth  
        g2.setColor(Color.red);
        CubicCurve2D mouthU = new CubicCurve2D.Double(20, 100, 40, 130, 50, 150, 90, 100);
        g2.setStroke(new BasicStroke(6));
        g2.draw(mouthU);
        
        //Draw the Tongue
        g2.fillArc(42, 88, 20, 80, 180, 180);

        
        
//        Line2D.Double mouth = new Line2D.Double(30, 110, 80, 110);
//        g2.setColor(Color.RED);
//        g2.draw(mouth);
//        g2.fillArc(45, 70, 20, 80, 180, 180);
//        //Draw tree log        
//        g2.setColor(Color.GREEN);      
//        Rectangle2D.Double log = new Rectangle2D.Double(180, 50, 5, 100);
//        g2.draw(log);
//        g2.fill(log);
//        
//        //Draw tree green
//        g2.setColor(Color.GREEN);
//        Line2D.Double green = new Line2D.Double(180, WIDTH, WIDTH, WIDTH)
       
    }

}
