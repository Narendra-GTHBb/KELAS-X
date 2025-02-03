
public class project7 {

  
    public static void main(String[] args) {
        //segitiga kiri atas
             for (int i = 1; i <= 5; i++)
    {
        for (int j = 5 ; j >= i; j--)
        {
            System.out.print(" * ");
        }
        System.out.println("   ");
    }
             System.out.println(" ");
             
        //segitiga kiri bawah
          for (int k = 1; k <= 5; k++)
    {
        for (int x = 1 ; x <= k; x++)
        {
            System.out.print(" * ");
        }
        System.out.println("   ");
    }
          System.out.println(" ");
          
          //segitiga kanan atas
        for (int a = 1; a <= 5; a++)
    {
        for (int b = 1; b < a; b++)
        {
            System.out.print("   ");
        }

        for (int c = 5; c >= a; c--)
        {
            System.out.print(" * ");
        }
        System.out.println("   ");
    }
        
        System.out.println(" ");
        
        //segitiga kanan bawah
    for (int e = 1; e <= 5; e++)
    {
        for (int f = 5; f > e; f--)
        {
            System.out.print("   ");
        }

        for (int g = 1; g <= e; g++)
        {
            System.out.print(" * ");
        }
        System.out.println("   ");
    }
    
        System.out.println(" ");
    
       for (int s = 1; s <= 2; s++)
    {
        for (int h = 1 ; h <= 3; h++)
        {
            System.out.println(s+"."+h);
        }
        System.out.println("");
    }
    
             
    }
    
}
