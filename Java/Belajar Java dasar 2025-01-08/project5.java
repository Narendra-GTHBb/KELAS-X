
import java.util.Scanner;


public class project5 {

   
    public static void main(String[] args) {
        System.out.println("Pemograman input output");
        Scanner InputUser= new Scanner(System.in);
        System.out.print("Inputkan Nilai Anda :");
        int angka= InputUser.nextInt();
        System.out.println("Nilai yang anda inputkan adalah :"+angka);
        
        Scanner InputUser1= new Scanner(System.in);
        System.out.print("Inputkan Nama Anda :");
        String nama= InputUser1.nextLine();
        System.out.println("Nama yang anda inputkan adalah :"+nama);
        
        
    }
    
}
