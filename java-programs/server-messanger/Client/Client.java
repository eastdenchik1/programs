package Client;

import java.awt.BorderLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;

import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTextArea;
import javax.swing.JTextField;

public class Client {
	
	private static JTextArea ta;
	private static JTextField t;
	private static BufferedReader reader; //�������� �� �������
	private static PrintWriter writer; //���������� �� ������
	private static String login;
	
	public static void main(String[] args) {
		go();
	}

	private static void go() {
		
		ImageIcon img = new ImageIcon("D:/logo.jpg");
		JOptionPane.showMessageDialog(null, img, "Messenger 2.0", -1);
		
		login = JOptionPane.showInputDialog("������� �����");
		
		JFrame f = new JFrame("Messenger 2.0");
		f.setResizable(false);
		f.setLocationRelativeTo(null);
		JPanel p = new JPanel();
		ta = new JTextArea(15, 30);
		ta.setLineWrap(true);
		ta.setEditable(false);
		ta.setWrapStyleWord(true);
		JScrollPane sp = new JScrollPane(ta);
		sp.setVerticalScrollBarPolicy(JScrollPane.VERTICAL_SCROLLBAR_AS_NEEDED);
		sp.setHorizontalScrollBarPolicy(JScrollPane.HORIZONTAL_SCROLLBAR_NEVER);
		t = new JTextField(20);
		JButton b = new JButton("���������");
		
		b.addActionListener(new Send());
		
		p.add(sp);
		p.add(b);
		p.add(t);
		setNet();
		
		Thread thread = new Thread(new Listener());
		thread.start();
		
		f.getContentPane().add(BorderLayout.CENTER, p);
		f.getContentPane().add(BorderLayout.SOUTH, b);
		f.setSize(400, 360);
		f.setVisible(true);
		f.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

	}
	
	private static class Listener implements Runnable{

		@Override
		public void run() {
			String msg;
			try{
				while((msg=reader.readLine())!=null){
					ta.append(msg+"\n");
				}
			}catch(Exception ex){}
		}
		
	}
	
	private static class Send implements ActionListener{

		@Override
		public void actionPerformed(ActionEvent e) {
			
			String msg = login+": "+t.getText();
			writer.println(msg);
			writer.flush();
			
			t.setText("");
			t.requestFocus();
			
		}
		
	}

	private static void setNet() {
		try {
			Socket sock = new Socket("78.155.207.100", 5000);
			InputStreamReader is = new InputStreamReader(sock.getInputStream());
			reader = new BufferedReader(is);
			writer = new PrintWriter(sock.getOutputStream());
		} catch (Exception ex){}
		
	}
	
}
