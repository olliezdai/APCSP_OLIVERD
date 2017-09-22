import java.util.Arrays;
import java.util.Scanner;

/**
 * Created by Oliver on 9/11/2017.
 */
public class SearchForElement {
    public static void main(String[] args)
    {
        Scanner input = new Scanner(System.in);
        int[] array = {1, 2, 3, 4, 5, 6, 7, 8, 9, 3, 6, 3, 3, 6, 15};
        System.out.println("What element (integer) do you want to find? ");
        int element = input.nextInt();
        boolean firstFind = true;
        int elementCount = 0;
        for(int i = 0; i < array.length; i++)
        {
            if(array[i] == element)
            {
                elementCount++;
            }
        }
        for(int i = 0; i < array.length; i++)
        {
            if(array[i] == element)
            {
                if(firstFind && elementCount > 1) {
                    System.out.print("Element '" + element + "' found at indices " + i);
                }else if(firstFind && elementCount == 1){
                    System.out.print("Element '" + element + "' found at index " + i);
                }else{
                    System.out.print(", "+i);
                }
                firstFind = false;
            }
        }
        if(elementCount == 0)
        {
            System.out.println("Element '"+element+"' not found");
        }
    }
}
